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
    <nav class="navbar navbar-expand-lg navbar-dark position-fixed w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <span>Zerlinda - Admin</span>
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
                            <label for="username" class="form-label">E-mail</label>
                            <input type="username" class="form-control" placeholder="username" name="username" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label d-flex justify-content-between">
                                Password
                            <span class="forgot-password">
                                <a href="#" class="text-decoration-none text-body">Forgot Password?</a>
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
