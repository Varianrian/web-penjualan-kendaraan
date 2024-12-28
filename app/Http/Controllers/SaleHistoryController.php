<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleHistory;

class SaleHistoryController extends Controller
{

    public function index()
    {
        $data = SaleHistory::all();
        return view('admin.sales.index', compact('data'));
    }

    public function cancel(SaleHistory $saleHistory)
    {
        $saleHistory->status = 'failed';
        $saleHistory->save();
        return redirect()->route('sales.index');
    }
}
