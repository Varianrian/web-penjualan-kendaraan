@extends('layouts.admin')

@section('contents')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Kendaraan</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0">Detail</h5>
                    <a href="{{ route('cars.index') }}" class="btn btn-secondary btn-sm ms-auto rounded-3"><i class="fas fa-arrow-left fa-2x"></i></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ Storage::url($data->image) }}" alt="{{ $data->name }}" class="img-fluid img-thumbnail" id="img-preview">
                        </div>
                        <div class="col-md-9">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Nama Kendaraan</td>
                                    <td>:</td>
                                    <td>{{ $data->name }}</td>
                                </tr>
                                <tr>
                                    <td>Model</td>
                                    <td>:</td>
                                    <td>{{ $data->model->name }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Plat</td>
                                    <td>:</td>
                                    <td>{{ $data->plate_number }}</td>
                                </tr>
                                <tr>
                                    <td>Transmisi</td>
                                    <td>:</td>
                                    <td>{{ $data->transmission }}</td>
                                </tr>
                                <tr>
                                    <td>Pajak</td>
                                    <td>:</td>
                                    <td>{{ $data->tax }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pajak</td>
                                    <td>:</td>
                                    <td>{{ date('d-m-Y', strtotime($data->exp_date)) }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td>:</td>
                                    <td>{{ $data->year }}</td>
                                </tr>
                                <tr>
                                    <td>Warna</td>
                                    <td>:</td>
                                    <td>{{ $data->color }}</td>
                                </tr>
                                <tr>
                                    <td>Kilometer</td>
                                    <td>:</td>
                                    <td>{{ $data->kilometers }}</td>
                                </tr>
                                <tr>
                                    <td>Wilayah Registrasi</td>
                                    <td>:</td>
                                    <td>{{ $data->registration_area }}</td>
                                </tr>
                                <tr>
                                    <td>CC Mesin</td>
                                    <td>:</td>
                                    <td>{{ $data->cc_engine }}</td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td>Rp. {{ number_format($data->price, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>{{ $data->is_sold == 0 ? 'Tersedia' : 'Terjual' }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-8">
                            <h3>Deskripsi</h3>
                            <p>{{ $data->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const imgPreview = document.getElementById('img-preview');
    const foto = document.getElementById('foto');

    foto.addEventListener('change', function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                imgPreview.setAttribute('src', this.result);
            });

            reader.readAsDataURL(file);
        }
    });
</script>
@endpush