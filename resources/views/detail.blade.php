@extends('layouts.app')

@section('car_id')
{{ $car->id }}
@endsection

@section('contents')
<section class="content-section full-height-section py-5" style="background-color: #f1f3ff">
    <div class="container">
        <div class="row bg-light rounded p-4 align-items-stretch">
            <div class="col d-flex flex-column">
                <div class="row">
                    <div class="col">
                        <img src="{{ Storage::url($car->image) }}" alt="Car Image" class="car-image img-fluid rounded-top" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <p style="text-align: justify;">
                                    {{ $car->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col d-flex flex-column">
                <div class="card h-100">
                    <div class="card-body">
                        <p class="card-title fw-bold text-danger">
                            Rp. {{ number_format($car->price, 0, ',', '.') }}
                        </p>
                        <h4 class="card-title">{{ $car->name }}</h4>
                        <h5 class="card-text">{{ $car->model->brand->name . ' - ' . $car->model->name }}</h5>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="width: 5%;">
                                        <i class="fas fa-tachometer-alt"></i>
                                    </td>
                                    <td>
                                        {{ number_format($car->kilometers, 0, ',', ',') }}m
                                    </td>
                                    <td style="width: 5%;">
                                        <i class="fas fa-calendar"></i>
                                    </td>
                                    <td>
                                        {{ $car->year }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-cogs"></i>
                                    </td>
                                    <td>
                                        {{ Str::ucfirst($car->transmission) }}
                                    </td>
                                    <td>
                                        <i class="fas fa-map"></i>
                                    </td>
                                    <td>
                                        {{ $car->registration_area }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-car"></i>
                                    </td>
                                    <td>
                                        {{ $car->cc_engine }}cc
                                    </td>
                                    <td>
                                        <i class="fas fa-paint-brush"></i>
                                    </td>
                                    <td>
                                        {{ $car->color }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-id-card"></i>
                                    </td>
                                    <td>
                                        {{ $car->plate_number }}
                                    </td>
                                    <td>
                                        <i class="fas fa-money-check-alt"></i>
                                    </td>
                                    <td>
                                        Rp. {{ number_format($car->tax, 0, ',', '.') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-calendar"></i>
                                    </td>
                                    <td>
                                        {{ date('d-m-Y', strtotime($car->exp_date)) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-end align-items-center">
                        @guest
                        <a class="btn btn-success" href="{{ route('login') }}">
                            Beli
                        </a>
                        @else
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#buyCarModal">
                            Beli
                        </button>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
