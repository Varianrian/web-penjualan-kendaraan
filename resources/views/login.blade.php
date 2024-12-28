<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ env('APP_NAME') }} | Login</title>
    <link href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            <div class="mb-3 form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                                    required>
                            </div>
                            <div class="mb-3 form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{ route('register') }}">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
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
</body>

</html>
