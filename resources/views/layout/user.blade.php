<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Tambahkan CSS untuk Bootstrap atau framework CSS lain jika diperlukan -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    @vite('resources/css/app.css')
</head>

<body>
    <div class=" d-block">


        <!-- Navbar -->
        <!-- <div class="flex-grow-1 " id="navbar">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Zerlinda Dental</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                            <a class="nav-link" href="#">Lokasi</a>
                            <a class="nav-link" href="#">Pelayanan</a>
                            <a class="nav-link" href="#">Blog</a>
                            <a class="nav-link" href="#">Jadwal</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div> -->

        <!-- asdadad -->
        <div class="flex-grow" id="navbar">
            <nav class="border-b-4">
                <div class="mx-auto px-4 py-3">
                    <div class="flex justify-between items-center">
                        <a class="text-xl font-bold text-pink-500" href="#">Zerlinda Dental</a>
                        <button class="navbar-toggler block lg:hidden p-2 rounded border focus:outline-none focus:ring"
                            type="button" aria-label="Toggle navigation">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <div class="hidden lg:flex lg:items-center text-pink-1000 font-bold">
                            <a class="nav-link px-4 py-2 " href="#">Home</a>
                            <a class="nav-link px-4 py-2 " href="#">Lokasi</a>
                            <a class="nav-link px-4 py-2 " href="#">Pelayanan</a>
                            <a class="nav-link px-4 py-2 " href="#">Blog</a>
                            <a class="nav-link px-4 py-2 " href="#">Jadwal</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>


        <!-- Konten Halaman -->
        <div class="d-flex justify-content-center align-items-center">
            <div class="text-center main-content">
                @yield('content')
            </div>
        </div>


        <!-- Footer -->
        <footer class="bg-pink-1100 min-h-48">
            <div>
                ini footer
            </div>
        </footer>
    </div>

</body>

</html>