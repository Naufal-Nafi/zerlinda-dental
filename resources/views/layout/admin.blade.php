<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Tambahkan CSS untuk Bootstrap atau framework CSS lain jika diperlukan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="d-flex ">
        <!-- Sidebar -->
        <div class="sidebar">
            <nav class="sidenav" style="">
                <div>
                    <h4 class="ms-3">Zerlinda Dental</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-house-door"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.contact') }}"><i class="bi bi-envelope"></i>Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('admin.landingpage') }} "><i class="bi bi-file-earmark-text"></i>Landing Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('admin.blog') }} "><i class="bi bi-journal"></i>Artikel Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('admin.doctor') }} "><i class="bi bi-calendar"></i>Jadwal Dokter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('admin.service') }} "> <i class="bi bi-gear"></i>Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('admin.password') }} "><i class="bi bi-lock"></i>Ubah Password</a>
                        </li>
                        <!-- Tambahkan menu lain di sini -->
                    </ul>
                </div>
                <div class="position-absolute bottom-0 w-100 mb-5">
                    <ul class="nav flex-column w-100" >
                        <li class="nav-item d-flex justify-content-center ">
                            <a class="nav-link text-decoration-none text-danger" href=" {{ route('admin.login') }} ">LogOut</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- Konten Utama -->
        <div class="flex-grow-1 " id="navbar">
            <!-- Navbar -->
            <nav class="navbar px-3" style="width: calc(100% - 250px); left: 250px; ">
                <div class='navbar-brand mb-0 h1'>
                    <span>Admin Page - </span>
                    <span>@yield('page-title')</span>
                </div>
                <span class="ml-auto" id="current-time"></span>
            </nav>

        </div>
        <!-- Konten Halaman -->
        <div class="container d-flex justify-content-center align-items-center"
            style="min-height: calc(100vh - 56px); width: calc(100% - 250px);">
            <div class="text-center main-content">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Script untuk menampilkan waktu saat ini -->
    <script>
        function updateTime() {
            const now = new Date();
            document.getElementById('current-time').textContent = now.toLocaleTimeString();
        }
        setInterval(updateTime, 1000);
        updateTime(); // Panggil sekali saat halaman dimuat
    </script>
</body>

</html>