@extends('layouts.app')

@section('contents')
<section class="content-section full-height-section py-5" style="background-color: #f1f3ff">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5">
                <h2>
                    <strong>
                        Tempat Beli Mobil Terbaik di Indonesia
                    </strong>
                </h2>
                <p>
                    Selamat datang di Bintang.Autogarage Kami menyediakan berbagai kendaraan
                    kualitas terbaik dengan harga terjangkau.
                </p>
            </div>
            <div class="col-lg-6 mb-5" style="padding-left: 5%">
                <img src="{{ asset('img/mobil.png') }}" alt="Car Image" class="car-image" />
            </div>
        </div>
        <div class="row bg-light rounded p-4" id="cars">
            @foreach ($cars as $car)
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ Storage::url($car->image) }}" alt="Car Image" class="car-image img-fluid" />
                    </div>
                    <div class="card-body">
                        <p class="card-title fw-bold text-danger">
                            Rp. {{ number_format($car->price, 0, ',', '.') }}
                        </p>
                        <h4 class="card-title">{{ $car->name }}</h4>
                        <h5 class="card-text">{{ $car->model->brand->name . ' - ' . $car->model->name }}</h5>
                        <p class="card-text">
                            <i class="fas fa-calendar"></i> {{ $car->year }} |
                            <i class="fas fa-cogs"></i> {{ Str::ucfirst($car->transmission) }}
                        </p>
                        <a href="{{ url('detail', $car->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
