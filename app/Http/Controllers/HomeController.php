<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\SaleHistory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('home', compact('cars'));
    }

    public function detail($id)
    {
        $car = Car::find($id);
        return view('detail', compact('car'));
    }

    public function history()
    {
        $sales = SaleHistory::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('history', compact('sales'));
    }

    public function buy(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'phone' => 'required',
        ]);

        $pending_sale = SaleHistory::where('car_id', $request->car_id)
            ->where('status', 'pending')
            ->first();
        if ($pending_sale) {
            return redirect()->back()->with('error', 'Selesaikan pembelian sebelumnya');
        }

        $car = Car::find($request->car_id);
        if (!$car) {
            return redirect()->back()->with('error', 'Kendaraan tidak ditemukan');
        }

        $sale = new SaleHistory();
        $sale->car_id = $car->id;
        $sale->user_id = Auth::id();
        $sale->phone = $request->phone;
        $sale->status = 'pending';
        $sale->save();

        $transaction = new Transaction();
        $transaction->user_id = Auth::id();
        $transaction->sale_history_id = $sale->id;

        return redirect()->route('payment', $sale->id)->with('success', 'Pembelian berhasil, silahkan melakukan pembayaran');
    }

    public function payment(Request $request, $id)
    {
        // Konfigurasi Midtrans
        $midtrans = config('services.midtrans');
        Config::$serverKey = $midtrans['serverKey'];
        Config::$isProduction = $midtrans['isProduction'];
        Config::$isSanitized = $midtrans['isSanitized'];
        Config::$is3ds = $midtrans['is3ds'];

        $sale = SaleHistory::find($id);
        if (!$sale) {
            return redirect()->back()->with('error', 'Data penjualan tidak ditemukan');
        }
        $transaction = Transaction::where('sale_history_id', $id)->first();
        if ($request->order_id && $request->status_code && $request->transaction_status) {
            $order_id = $request->order_id;
            $status_code = $request->status_code;
            $transaction_status = $request->transaction_status;

            $transaction->order_id = $order_id;
            $transaction->status_code = $status_code;
            $transaction->payment_status = $transaction_status;
            $transaction->save();

            $t = (object) \Midtrans\Transaction::status($order_id);
            if ($t->transaction_status !== 'settlement') {
                $sale->status = 'failed';
                $sale->save();
                return redirect()->route('detail', $sale->car->id)->with('error', 'Pembayaran gagal, silahkan coba lagi');
            }

            $sale->status = 'success';
            $sale->save();

            return redirect()->route('detail', $sale->car->id)->with('success', 'Pembayaran berhasil, silahkan tunggu pesan kami melalui nomor telepon yang telah dimasukkan');
        }
        if (!$transaction) {
            $transaction = new Transaction();
            $transaction->user_id = Auth::id();
            $transaction->sale_history_id = $sale->id;
            $transaction->order_id = uniqid();
            $transaction->payment_type = 'payment-gateway';
            $transaction->gross_amount = $sale->car->price;
            $transaction->save();
        }

        $transaction_data = array(
            'transaction_details' => [
                'order_id' => $transaction->order_id,
                'gross_amount' => $transaction->gross_amount,
            ],
            "callbacks" => [
                "finish" => route('payment', $id),
                "error" => route('payment', $id),
            ],
        );

        try {
            $snapToken = Snap::getSnapToken($transaction_data);
            return view('payment', compact('snapToken'));
        } catch (\Exception $e) {
            $t = (object) \Midtrans\Transaction::status($transaction->order_id);
            if ($t->transaction_status === 'settlement') {
                $sale->status = 'success';
                $sale->save();
                return redirect()->route('detail', $sale->car->id)->with('success', 'Pembayaran berhasil, silahkan tunggu pesan kami melalui nomor telepon yang telah dimasukkan');
            } else {
                $transaction->order_id = uniqid();
                $transaction_data['transaction_details']['order_id'] = $transaction->order_id;
                $snapToken = Snap::getSnapToken($transaction_data);
                return view('payment', compact('snapToken'));
            }
        }
    }

    public function cancelPayment($id)
    {
        $sale = SaleHistory::find($id);
        if (!$sale) {
            return redirect()->back()->with('error', 'Data penjualan tidak ditemukan');
        }

        $sale->status = 'failed';
        $sale->save();

        return redirect()->back()->with('success', 'Pembayaran dibatalkan');
    }
}
