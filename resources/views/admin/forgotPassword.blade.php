<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password</title>
    <link rel="icon" href="{{ asset('images/logo_simple.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark position-fixed " style="width: 100% !important; left: 0 !important;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <span>Zerlinda - Admin</span>
            </a>
        </div>
    </nav>

    <!-- Login Form -->
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-sm p-5" style="max-width: 400px; width: 100%;">
            <h1 class="text-center mb-4 fw-bold">Masukkan Digit</h1>            
                <form action="{{ route('admin.password.request.verify') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <p>Cek Email yang terdaftar pada admin Klinik Zerlinda Dental Care!</p>
                            
                            <input type="text"  class="form-control" placeholder="Kode Konfirmasi" name="token" id="token" required>
                        </div>                        
                        <button type="submit" class="btn btn-login w-100">Submit</button>
                    </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>