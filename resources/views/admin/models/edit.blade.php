@extends('layouts.admin')

@section('contents')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Model</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0">Edit</h5>
                    <a href="{{ route('models.index') }}" class="btn btn-secondary btn-sm ms-auto rounded-3"><i class="fas fa-arrow-left fa-2x"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ route('models.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="brand_id" class="form-label">Brand</label>
                            <select class="form-select @error('brand_id') is-invalid @enderror" id="brand_id" name="brand_id" required>
                                <option value="">Pilih Brand</option>
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $data->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Kode Model</label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ $data->code }}" required>
                            @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Model</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $data->name }}" required>
                            @error('name')
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
