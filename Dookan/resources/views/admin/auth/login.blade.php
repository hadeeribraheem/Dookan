<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom CSS (Optional) -->
    <link href="{{ asset('css/admin-style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="login">
        <div class="container">
            <div class="card login-card">
                <div class="login-logo d-flex justify-content-center align-items-center">
                <i class="bi bi-bag-check-fill"></i>
            </div>
                <h2 class="text-center">Login Page</h2>
                <form method="post" action="{{ route('admin.auth.login') }}"  enctype="multipart/form-data" class="admin-login">
                @csrf
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" name="email"
                           value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" name="password" type="password">
                </div>
                @if ($errors->has('error'))
                    <div>
                        <p class="alert alert-danger mt-2"> {{ $errors->first('error') }}</p>
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>






















