<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title>Admin - {{ env('APP_NAME') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminkit/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/datatables/dataTables.bootstrap4.min.css') }}">
    @stack('styles')

</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                <div class="simplebar-content" style="padding: 0px;">
                                    <a class="sidebar-brand text-center" href="{{ route('dashboard') }}">
                                        <span class="sidebar-brand-text align-middle">
                                            {{ env('APP_NAME') }}
                                        </span>
                                    </a>

                                    <div class="sidebar-user text-white">
                                        <div class="d-flex justify-content-center gap-3">
                                            <div class="flex-shrink-0 ps-3">
                                                <i class="fas fa-user fa-2x"></i>
                                            </div>
                                            <div class="flex-grow-1 ps-2">
                                                <span class="sidebar-user-title">
                                                    {{ auth()->user()->name }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="sidebar-nav">
                                        <li class="sidebar-header">
                                            Halaman
                                        </li>
                                        <li class="sidebar-item {{ Route::is('dashboard') ? 'active' : '' }}">
                                            <a class="sidebar-link" href="{{ route('dashboard') }}">
                                                <i class="fas fa-home"></i>
                                                <span class="align-middle">Dashboard</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item {{ Route::is('users.*') ? 'active' : '' }}">
                                            <a class="sidebar-link" href="{{ route('users.index') }}">
                                                <i class="fas fa-users"></i>
                                                <span class="align-middle">Pengguna</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item {{ Route::is('brands.*') ? 'active' : '' }}">
                                            <a class="sidebar-link" href="{{ route('brands.index') }}">
                                                <i class="fas fa-tags"></i>
                                                <span class="align-middle">Brand</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item {{ Route::is('models.*') ? 'active' : '' }}">
                                            <a class="sidebar-link" href="{{ route('models.index') }}">
                                                <i class="fas fa-car"></i>
                                                <span class="align-middle">Model</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item {{ Route::is('cars.*') ? 'active' : '' }}">
                                            <a class="sidebar-link" href="{{ route('cars.index') }}">
                                                <i class="fas fa-car-side"></i>
                                                <span class="align-middle">Kendaraan</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item {{ Route::is('sales.*') ? 'active' : '' }}">
                                            <a class="sidebar-link" href="{{ route('sales.index') }}">
                                                <i class="fas fa-money-bill-wave"></i>
                                                <span class="align-middle">Penjualan</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link" href="{{ route('logout') }}">
                                                <i class="fas fa-sign-out-alt"></i>
                                                <span class="align-middle">Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 1490px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar" style="height: 298px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                </div>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
            </nav>

            <main class="content">
                @yield('contents')
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                Copyright © 2024 All rights reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('adminkit/js/app.js') }}"></script>
    <script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <script src="{{ asset('vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            const form = event.target.closest('form');
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: 'Data yang dihapus tidak dapat dikembalikan',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

        $(document).ready(function() {
            $('#datatable').DataTable();
            $('.dataTable').DataTable();
        });
    </script>
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session("success") }}',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
    @endif
    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session("error") }}',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
    @endif

    @stack('scripts')
</body>

</html>
