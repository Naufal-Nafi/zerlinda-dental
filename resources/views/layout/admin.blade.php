<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Tambahkan CSS untuk Bootstrap atau framework CSS lain jika diperlukan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="d-flex ">
        <!-- Sidebar -->
        <div class="sidebar top-0">
            <img src="{{ asset('images/logo_horizontal.png') }}" alt="Logo" class="mb-4" style="width: 80%;">
            <nav class="sidenav" style="">
                <div>
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
                <div class="position-absolute bottom-0 w-100" style="margin-bottom: 150px;">
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
            style="min-height: 100vh; width: calc(100% - 250px);">
            <div class="main-content" style="width: 70%;">
                @yield('content')
            </div>
        </div>
    </div>



    <!--Create Modal -->
    <div class="modal fade" id="@yield('createModalName')" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-light-pink">
                
                <div class="modal-body">
                    @yield('createModalContent')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>



    <!--Edit Modal -->
    <div class="modal fade" id="@yield('editModalName')" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-light-pink">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @yield('editModalContent')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>


    <!--Hapus Modal -->
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>