<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ env('APP_NAME') }}</title>

    <link href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/fontawesome/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    <style>
        .logo {
            max-width: 100px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 2rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand logo" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.jpeg') }}" alt="Logo" style="width: 300px" class="rounded-3">
            </a>
            <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fas fa-bars"></i> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item me-3">
                            <a class="btn btn-warning rounded" href="{{ url('history') }}">Riwayat Pembelian</a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        @guest
                            <a class="btn btn-secondary" href="{{ route('login') }}">Login</a>
                        @else
                            <a class="btn btn-secondary" href="{{ route('logout') }}">Logout</a>
                        @endguest
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('contents')

    <div class="container my-5">
        <!-- Footer -->
        <footer>
            <div class="container p-4 pb-0">
                <!-- Section: Links -->
                <section class="">
                    <!--Grid row-->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                Jalan Riau No 43 Bandung
                            </h6>
                            <p>bintang.autogarage@gmail.com/p>
                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                Our services
                            </h6>
                            <p>
                                <a class="text-decoration-none" href="{{ url('#cars') }}">Beli</a>
                            </p>
                        </div>
                        <hr class="w-100 clearfix d-md-none" />
                        <hr class="w-100 clearfix d-md-none" />
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #0d28a6" href="#!"
                                role="button"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #0d28a6" href="#!"
                                role="button"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #0d28a6" href="#!"
                                role="button"><i class="fab fa-x-twitter"></i></a>
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #0d28a6" href="#!"
                                role="button"><i class="fab fa-google"></i></a>
                        </div>
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                Copyright &copy; 2024
                            </h6>
                        </div>
                    </div>

                    <!-- Grid column -->
                </section>
            </div>
        </footer>
    </div>

    <!-- modal -->
    <div class="modal fade" id="buyCarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Beli Mobil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('buy') }}" method="POST">
                        @csrf
                        @hasSection('car_id')
                            <input type="hidden" name="car_id" value="@yield('car_id')" />
                        @endif
                        <div class="mb-3">
                            <label for="phone" class="form-label">No HP</label>
                            <input type="text" class="form-control" id="phone" name="phone" required />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Lanjutkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @if ($alert = session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: `<?= $alert ?>`,
                showConfirmButton: true,
                timer: 3000
            });
        </script>
    @endif
    @if($alert = session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: `<?= $alert ?>`,
                showConfirmButton: true,
                timer: 3000
            });
        </script>
    @endif
    @stack('scripts')
</body>

</html>