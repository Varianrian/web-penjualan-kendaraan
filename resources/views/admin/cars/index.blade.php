@extends('layouts.admin')

@section('contents')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Kendaraan</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0">Data</h5>
                    <a href="{{ route('cars.create') }}" class="btn btn-primary btn-sm ms-auto rounded-3"><i class="fas fa-plus fa-2x"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered table-hover" style="width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Brand</th>
                                    <th>Nama Model</th>
                                    <th>Nama Kendaraan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->model->brand->name }}</td>
                                    <td class="text-center">{{ $item->model->name }}</td>
                                    <td class="text-center">{{ $item->name }}</td>
                                    <td class="text-center">
                                        @if(!$item->is_sold)
                                        <span class="badge bg-success">Tersedia</span>
                                        @else
                                        <span class="badge bg-danger">Terjual</span>
                                        @endif
                                    </td>
                                    <td class="text-center" style="width: 100px;">
                                        <a href="{{ route('cars.show', $item->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('cars.edit', $item->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('cars.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" onclick="return confirmDelete(event)"><i class="fas fa-trash"></i></button>
                                        </form>
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
