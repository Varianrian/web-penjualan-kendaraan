@extends('layouts.app')

@section('contents')
<section class="content-section full-height-section py-5" style="background-color: #f1f3ff">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Riwayat Pembelian</h2>
            </div>
        </div>
        <div class="row bg-light rounded p-4 align-items-stretch">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kendaraan</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                        <tr>
                            <td>{{ $sale->created_at }}</td>
                            <td>{{ $sale->car->name }}</td>
                            <td>Rp. {{ number_format($sale->car->price, 0, ',', '.') }}</td>
                            <td>
                                @if ($sale->status == 'pending')
                                <span class="badge bg-warning text-dark">Menunggu Pembayaran</span>
                                @elseif ($sale->status == 'success')
                                <span class="badge bg-success">Berhasil dibeli</span>
                                @else
                                <span class="badge bg-danger">Dibatalkan</span>
                                @endif
                            </td>
                            <td>
                                @if ($sale->status == 'pending')
                                <a href="{{ route('payment', $sale->id) }}" class="btn btn-primary">Bayar</a>
                                <a href="{{ route('payment.cancel', $sale->id) }}" class="btn btn-danger">Batalkan</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
