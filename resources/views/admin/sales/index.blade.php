@extends('layouts.admin')

@section('contents')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Penjualan</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0">Data</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered table-hover" style="width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Customer</th>
                                    <th>No. HP</th>
                                    <th>Nama Kendaraan</th>
                                    <th>Nominal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                    <td class="text-center">{{ $item->user->name }}</td>
                                    <td class="text-center">{{ $item->phone }}</td>
                                    <td class="text-center">{{ $item->car->name }}</td>
                                    <td class="text-center">Rp. {{ number_format($item->car->price, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        @if($item->status == 'success')
                                        <span class="badge bg-success">Terbayar</span>
                                        @elseif ($item->status == 'failed')
                                        <span class="badge bg-danger">Gagal</span>
                                        @else
                                        <span class="badge bg-warning">Menunggu pembayaran</span>
                                        @endif
                                    </td>
                                    <td class="text-center" style="width: 100px;">
                                        @if($item->status == 'pending')
                                        <form action="{{ route('sales.cancel', $item->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-danger btn-sm" onclick="confirmCancel(event)">Batalkan</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">Data tidak ditemukan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function confirmCancel(event) {
        event.preventDefault();
        const form = event.target.closest('form');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: 'Transaksi akan dibatalkan',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, batalkan',
            cancelButtonText: 'Kembali'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>
@endpush
