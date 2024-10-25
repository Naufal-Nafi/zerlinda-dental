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
    <link rel="icon" href="{{ asset('images/logo_simple.png') }}">
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

        <!-- navbar -->
        <div class="flex-grow " id="navbar">
            <nav class="border-b-4 bg-white fixed top-0 left-0 right-0 z-50">
                <div class="mx-auto px-4 py-3">
                    <div class="flex justify-between items-center">
                        <img src="{{ asset('images/logo_horizontal.png') }}" alt="Logo" class="w-48">
                        <button class="navbar-toggler block lg:hidden p-2 rounded border focus:outline-none focus:ring"
                            type="button" aria-label="Toggle navigation">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <div class="hidden lg:flex lg:items-center text-pink-primary font-bold">
                            <a class="nav-link px-6 py-2 " href="{{ '/home' }}">Home</a>
                            <a class="nav-link px-6 py-2 " href="{{ route('location') }}">Lokasi</a>
                            <div class="relative group">
                                <button class="nav-link px-6 py-2 flex items-center">
                                    Pelayanan
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <!-- Dropdown Menu -->
                                <div
                                    class="absolute py-2 hidden group-hover:block bg-white shadow-md text-left rounded-lg border-2 border-pink-primary w-44">
                                    <a class="block px-4 py-2 text-black hover:bg-pink-secondary"
                                        href="{{ route('service.adult') }}">Dewasa</a>
                                    <a class="block px-4 py-2 text-black hover:bg-pink-secondary"
                                        href="{{ route('service.child') }}">Anak-anak</a>
                                </div>
                            </div>
                            <a class="nav-link px-6 py-2 " href="#">Blog</a>
                            <a class="nav-link px-6 py-2 " href="#">Jadwal</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div style="min-height: 88.5px;">
        </div>


        <!-- Konten Halaman -->
        <div class="d-flex justify-content-center align-items-center">
            <div class="text-center main-content overflow-x-hidden">
                @yield('content')
            </div>
        </div>


        <!-- Footer -->
        <footer class="bg-pink-200 py-8 px-4 rounded-t-3xl">
            <div class="max-w-6xl mx-auto gap-4 md:text-left text-center text-blue-primary">

                <!-- Logo Section -->
                <div>
                    <h2 class="text-4xl font-bold mb-4">Zerlinda Dental Care</h2>
                </div>

                <!-- Halaman Lain -->
                <div class="md:flex md:justify-between block">
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Halaman Lain :</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="">Pelayanan Dewasa</a></li>
                            <li><a href="#" class="">Pelayanan Anak</a></li>
                            <li><a href="#" class="">Jadwal Dokter</a></li>
                            <li><a href="#" class="">Blog</a></li>
                        </ul>
                    </div>

                    <!-- Kontak -->
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Kontak :</h3>
                        <ul class="space-y-2">
                            <ul>
                                <li class="flex items-center mb-4">
                                    <span><img src="{{ asset('icons/icon_gmail_.png') }}" alt="Facebook Icon"
                                            class="w-7 me-4"></span>
                                    <span>zerlindadentalcare@gmail.com</span>
                                </li>
                                <li class="flex items-center mb-4">
                                    <span><img src="{{ asset('icons/icon_instagram_.png') }}" alt="Gmail Icon"
                                            class="w-7 me-4"></span>
                                    <span>zerlindadentalcare</span>
                                </li>
                                <li class="flex items-center mb-4">
                                    <span><img src="{{ asset('icons/icon_facebook_.png') }}" alt="Instagram Icon"
                                            class="w-7 me-4"></span>
                                    <span>Zerlinda Dental Care</span>
                                </li>
                                <li class="flex items-center mb-4">
                                    <span><img src="{{ asset('icons/icon_tiktok_.png') }}" alt="TikTok Icon"
                                            class="w-7 me-4"></span>
                                    <span>zerlindadentalcare</span>
                                </li>
                                <li class="flex items-center mb-4">
                                    <span><img src="{{ asset('icons/icon_whatsapp_.png') }}" alt="WhatsApp Icon"
                                            class="w-7 me-4"></span>
                                    <span>08999999999999</span>
                                </li>
                            </ul>

                        </ul>
                    </div>

                    <!-- Jadwal Klinik & Lokasi Klinik -->
                    <div>
                        <h3 class="text-xl font-semibold  mb-4">Jadwal Klinik :</h3>
                        <p class="">Senin - Jumat : 15:00 - 21:00</p>
                        <p class="">Sabtu : 18:00 - 20:00</p>

                        <h3 class="text-xl font-semibold  mt-6 mb-4">Lokasi Klinik :</h3>
                        <p class="">Jalan Kalasan</p>
                    </div>
                </div>

                <div class="md:flex justify-between mt-12">
                    <p>&copy; Zerlinda Dental Care</p>
                    <p style="margin-right: 70px">Developed by NPN</p>
                </div>
            </div>

        </footer>

    </div>

</body>

</html>