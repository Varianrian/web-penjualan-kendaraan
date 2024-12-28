@extends('layouts.admin')

@section('contents')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Kendaraan</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0">Tambah</h5>
                    <a href="{{ route('cars.index') }}" class="btn btn-secondary btn-sm ms-auto rounded-3"><i class="fas fa-arrow-left fa-2x"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ route('cars.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="model_id" class="form-label">Model</label>
                            <select class="form-select @error('model_id') is-invalid @enderror" id="model_id" name="model_id" required>
                                <option value="">Pilih Model</option>
                                @foreach($models as $model)
                                <option value="{{ $model->id }}">{{ $model->name }}</option>
                                @endforeach
                            </select>
                            @error('model_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kendaraan</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="plate_number" class="form-label">Nomor Plat</label>
                            <input type="text" class="form-control @error('plate_number') is-invalid @enderror" id="plate_number" name="plate_number" value="{{ old('plate_number') }}" required>
                            @error('plate_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="transmission" class="form-label">Transmisi</label>
                            <select class="form-select @error('transmission') is-invalid @enderror" id="transmission" name="transmission" required>
                                <option value="">Pilih Transmisi</option>
                                <option value="manual">Manual</option>
                                <option value="automatic">Automatic</option>
                            </select>
                            @error('transmission')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tax" class="form-label">Pajak</label>
                            <input type="text" class="form-control @error('tax') is-invalid @enderror" id="tax" name="tax" value="{{ old('tax') }}" required>
                            @error('tax')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exp_date" class="form-label">Tanggal Pajak</label>
                            <input type="date" class="form-control @error('exp_date') is-invalid @enderror" id="exp_date" name="exp_date" value="{{ old('exp_date') }}" required>
                            @error('exp_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="year" class="form-label">Tahun</label>
                            <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year') }}" required>
                            @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label">Warna</label>
                            <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" value="{{ old('color') }}" required>
                            @error('color')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kilometers" class="form-label">Kilometer</label>
                            <input type="number" class="form-control @error('kilometers') is-invalid @enderror" id="kilometers" name="kilometers" value="{{ old('kilometers') }}" required>
                            @error('kilometers')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="registration_area" class="form-label">Wilayah Registrasi</label>
                            <input type="text" class="form-control @error('registration_area') is-invalid @enderror" id="registration_area" name="registration_area" value="{{ old('registration_area') }}" required>
                            @error('registration_area')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="cc_engine" class="form-label">CC Mesin</label>
                            <input type="number" class="form-control @error('cc_engine') is-invalid @enderror" id="cc_engine" name="cc_engine" value="{{ old('cc_engine') }}" required>
                            @error('cc_engine')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Foto</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required accept="image/*">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <img id="img-preview" class="img-fluid mt-3" />
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="is_sold" class="form-label">Status</label>
                            <select class="form-select @error('is_sold') is-invalid @enderror" id="is_sold" name="is_sold" required>
                                <option value="">Pilih Status</option>
                                <option value="0" selected>Tersedia</option>
                                <option value="1">Terjual</option>
                            </select>
                            @error('is_sold')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
