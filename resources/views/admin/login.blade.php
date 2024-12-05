<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar-login w-100 position-fixed w-100" style="height: 50px; background: var(--primary-color)">
        <div class="container-fluid my-auto">
            <a class="navbar-brand my-auto text-white text" href="#">
                <span><img class="img-fluid" src="{{ asset('images/logo_horizontal.png') }}" style="width: 150px; " alt=""></span>
            </a>
        </div>
    </nav>

    <!-- Login Form -->
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-sm p-5" style="max-width: 400px; width: 100%;">
            <h1 class="text-center mb-4 fw-bold">Login</h1>            
                <form action="{{ route('admin.login.post') }}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="username" class="form-control" placeholder="username" name="username" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label d-flex justify-content-between">
                                Password
                            <span class="forgot-password">
                                <a href="{{ route('admin.forgotPassword') }}" class="text-decoration-none text-body">Forgot Password?</a>
                            </span>
                            </label>
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                        </div>
                        <button type="submit" class="btn btn-login w-100">Login</button>
                    </form>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
