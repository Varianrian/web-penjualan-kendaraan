@extends('layouts.admin')

@section('contents')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1 class="mb-0">Selamat Datang di Dashboard Admin {{ env('APP_NAME') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
