<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <h1 class="text-center mb-4 fw-bold">Ubah Password</h1>
            <!-- <form action="post">            
            <div class="mb-3">        
                <input type="password" class="form-control" placeholder="Current Password" name="" id=""> <!-- required -->

            <!-- <button type="submit" class="btn btn-login w-100 mt-3">Login</button> -->
            <!-- <a class='btn btn-login w-100' type="submit" href="{{ route('admin.login') }}">Masukkan</a>
        </form> -->

            <form action="{{ route('admin.password.update') }}" method="POST">
                @csrf
                <!-- Password Saat Ini -->

                <!-- Password Baru -->
                <div class="mb-3">
                    <input type="password" name="new_password" class="form-control" placeholder="Password Baru"
                        required>
                </div>

                <!-- Konfirmasi Password Baru -->
                <div class="mb-3">
                    <input type="password" name="new_password_confirmation" class="form-control"
                        placeholder="Konfirmasi Password Baru" required>
                </div>

                <button type="submit" class="btn btn-login w-100">Ubah Password</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>