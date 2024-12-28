@extends('layouts.admin')

@section('contents')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Brand</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0">Edit</h5>
                    <a href="{{ route('brands.index') }}" class="btn btn-secondary btn-sm ms-auto rounded-3"><i class="fas fa-arrow-left fa-2x"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ route('brands.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Brand</label>
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
