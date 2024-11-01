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

        
        <!-- navbar -->
        <div class="flex-grow " id="navbar">
            <nav class="border-b-4 bg-white fixed top-0 left-0 right-0 z-50">
                <div class="mx-auto px-4 py-3">
                    <div class="flex justify-between items-center">
                        <img src="{{ asset('images/logo_horizontal.png') }}" alt="Logo" class="w-48">

                        <!-- Navbar Toggler -->
                        <button class="navbar-toggler block lg:hidden p-2 rounded border focus:outline-none focus:ring"
                            type="button" aria-label="Toggle navigation" onclick="toggleNavbar()">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>

                        <!-- Offcanvas / Drawer Menu -->
                        <div id="offcanvas-navbar"
                            class="fixed top-0 left-0 w-full h-1/2 bg-white shadow-lg transform -translate-y-full transition-transform duration-300 lg:hidden z-40">
                            <div class="p-4 border-b flex justify-between">
                                <p class="text-3xl text-pink-primary font-bold">Menu</p>
                                <button class="text-gray-500 focus:outline-none" onclick="toggleNavbar()">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex flex-col text-center text-pink-primary font-bold p-4">
                                <a class="nav-link px-4 py-2" href="{{ route('home') }}">Home</a>
                                <a class="nav-link px-4 py-2" href="{{ route('location') }}">Lokasi</a>
                                <a class="nav-link px-4 py-2" href="{{ route('blog') }}">Blog</a>
                                <a class="nav-link px-4 py-2" href="{{ route('schedule') }}">Jadwal</a>
                                <!-- Pelayanan Dropdown -->
                                <div class="relative group mx-auto">
                                    <button class="nav-link px-4 py-2 flex items-center">
                                        Pelayanan
                                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div
                                        class="absolute py-2 hidden group-hover:block bg-white shadow-md text-left rounded-lg border-2 border-pink-primary w-44">
                                        <a class="block px-4 py-2 text-black hover:bg-pink-secondary"
                                            href="{{ route('service.adult') }}">Dewasa</a>
                                        <a class="block px-4 py-2 text-black hover:bg-pink-secondary"
                                            href="{{ route('service.child') }}">Anak-anak</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Normal Navbar Links for Larger Screens -->
                        <div class="isi-navbar hidden lg:flex lg:items-center text-pink-primary font-bold ">
                            <a class="nav-link px-6 py-2 hover:text-blue-primary duration-300"
                                href="{{ '/home' }}">Home</a>
                            <a class="nav-link px-6 py-2 hover:text-blue-primary duration-300"
                                href="{{ route('location') }}">Lokasi</a>
                            <div class="relative group">
                                <button
                                    class="pelayanan nav-link px-6 py-2 flex items-center hover:text-blue-primary duration-300">
                                    Pelayanan
                                    <!-- <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg> -->
                                </button>
                                <div
                                    class="absolute py-2 hidden group-hover:block bg-white shadow-md text-left rounded-lg border-2 border-pink-primary w-44">
                                    <a class="block px-4 py-2 text-black hover:bg-pink-secondary"
                                        href="{{ route('service.adult') }}">Dewasa</a>
                                    <a class="block px-4 py-2 text-black hover:bg-pink-secondary"
                                        href="{{ route('service.child') }}">Anak-anak</a>
                                </div>
                            </div>
                            <a class="nav-link px-6 py-2 hover:text-blue-primary duration-300" href="{{ route('blog') }}">Blog</a>
                            <a class="nav-link px-6 py-2 hover:text-blue-primary duration-300" href="{{ route('schedule') }}">Jadwal</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <script>
            // Offcanvas / Drawer toggler
            function toggleNavbar() {
                const offcanvas = document.getElementById('offcanvas-navbar');
                offcanvas.classList.toggle('-translate-y-full');
            }
        </script>


        <div style="min-height: 88.5px;">
        </div>


        <!-- Konten Halaman -->
        <div class="d-flex justify-content-center align-items-center">
            <div class="text-center main-content overflow-x-hidden">
                @yield('content')
            </div>
        </div>


        <!-- Footer -->
        <footer class="bg-pink-secondary py-8 px-4 rounded-t-3xl">
            <div class="max-w-6xl mx-auto gap-4 text-left  text-blue-primary">

                <!-- Logo Section -->
                <div>
                    <h2 class="text-4xl font-bold mb-12">Zerlinda Dental Care</h2>
                </div>

                <!-- Halaman Lain -->
                <div class="md:flex md:justify-between block">
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Halaman Lain :</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('service.adult') }}" class="hover:text-pink-primary">Pelayanan
                                    Dewasa</a></li>
                            <li><a href="{{ route('service.child') }}" class="hover:text-pink-primary">Pelayanan
                                    Anak</a></li>
                            <li><a href="{{ route('schedule') }}" class="hover:text-pink-primary">Jadwal Dokter</a></li>
                            <li><a href="{{ route('blog') }}" class="hover:text-pink-primary">Blog</a></li>
                        </ul>
                    </div>

                    <!-- Kontak -->
                    <div class="contact">
                        <h3 class="text-xl font-semibold mb-4">Kontak :</h3>
                        <ul>
                            <li class="flex items-center mb-4">
                                <span><img src="{{ asset('icons/icon_gmail_.png') }}" alt="Gmail Icon"
                                        class="w-7 me-4"></span>
                                <a href="mailto:zerlindadentalcare@gmail.com" target="_blank"
                                    class="hover:text-pink-primary">zerlindadentalcare@gmail.com</a>
                            </li>
                            <li class="flex items-center mb-4">
                                <span><img src="{{ asset('icons/icon_instagram_.png') }}" alt="Instagram Icon"
                                        class="w-7 me-4"></span>
                                <a href="https://www.instagram.com/zerlindadentalcare" target="_blank"
                                    class="hover:text-pink-primary">zerlindadentalcare</a>
                            </li>
                            <li class="flex items-center mb-4">
                                <span><img src="{{ asset('icons/icon_facebook_.png') }}" alt="Facebook Icon"
                                        class="w-7 me-4"></span>
                                <a href="https://www.facebook.com/ZerlindaDentalCare" target="_blank"
                                    class="hover:text-pink-primary">Zerlinda Dental Care</a>
                            </li>
                            <li class="flex items-center mb-4">
                                <span><img src="{{ asset('icons/icon_tiktok_.png') }}" alt="TikTok Icon"
                                        class="w-7 me-4"></span>
                                <a href="https://www.tiktok.com/@zerlindadentalcare" target="_blank"
                                    class="hover:text-pink-primary">zerlindadentalcare</a>
                            </li>
                            <li class="flex items-center mb-4">
                                <span><img src="{{ asset('icons/icon_whatsapp_.png') }}" alt="WhatsApp Icon"
                                        class="w-7 me-4"></span>
                                <span href="" target="_blank"
                                    class="">089604299993</span>
                            </li>
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
                    <p>&copy; Zerlinda Dental Care 2024</p>
                    <p style="margin-right: 70px">Developed by NPN</p>
                </div>
            </div>

        </footer>

        <!-- Ikon WhatsApp di pojok kanan bawah -->
        <a href="https://wa.me/6289604299993" target="_blank" class="fixed bottom-5 right-5">
            <div class="bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition duration-300">
                <!-- SVG Ikon WhatsApp -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24">
                    <path
                        d="M20.52 3.47A11.42 11.42 0 0012 0a11.42 11.42 0 00-8.48 3.47A11.56 11.56 0 000 12.06a11.25 11.25 0 001.56 5.77L.03 24l6.4-1.66a11.5 11.5 0 005.57 1.44h.01a11.56 11.56 0 008.47-3.47A11.56 11.56 0 0024 12.06a11.42 11.42 0 00-3.48-8.59zM12 21.45a9.77 9.77 0 01-5-1.36l-.36-.21-3.8 1 1-3.7-.24-.38A9.9 9.9 0 012.4 12.06a9.92 9.92 0 012.93-7.07A9.77 9.77 0 0112 2.28c2.63 0 5.1 1.03 7 2.91a9.77 9.77 0 012.92 7.07c0 2.64-1.03 5.12-2.92 7.01a9.82 9.82 0 01-7 2.91zm5.38-7.71c-.3-.15-1.78-.88-2.06-.98s-.48-.15-.68.15-.78.98-.96 1.18-.35.22-.65.07a8.12 8.12 0 01-2.38-1.47 8.64 8.64 0 01-1.6-1.99c-.16-.3 0-.45.14-.6.13-.13.3-.34.45-.52.15-.17.2-.3.3-.5s.05-.38-.02-.52c-.07-.15-.68-1.65-.94-2.27-.25-.6-.5-.5-.68-.5h-.58c-.2 0-.5.07-.76.38s-1 1-.98 2.42 1.03 2.78 1.17 2.98c.15.2 2.03 3.1 4.9 4.34.68.3 1.2.48 1.6.62.67.21 1.28.18 1.75.11.54-.08 1.78-.73 2.03-1.44.25-.7.25-1.3.18-1.44-.08-.15-.28-.22-.58-.37z" />
                </svg>
            </div>
        </a>

    </div>

</body>

</html>