<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- jquery  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- carousel  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- aos  -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('images/logo_simple.png') }}">
</head>

<body>
    <div class=" d-block selection:bg-blue-500 caret-pink-primary">

        <!-- navbar -->
        <div class="flex-grow " id="navbar">
            <nav class="border-b-4 bg-white fixed top-0 left-0 right-0 z-50">
                <div class="mx-auto px-4 py-3">
                    <div class="flex justify-between items-center">
                        <img src="{{ asset('images/logo_horizontal.png') }}" alt="Logo" class="w-40">

                        <!-- Navbar Toggler -->
                        <button
                            class="navbar-toggler block lg:hidden p-2 rounded border focus:outline-none focus:ring ring-pink-primary"
                            type="button" aria-label="Toggle navigation" onclick="toggleNavbar()">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>

                        <!-- Offcanvas / Drawer Menu (for small screen)-->
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
                                <a class="nav-link px-4 py-2 active:text-blue-primary"
                                    href="{{ route('home') }}">Home</a>
                                <a class="nav-link px-4 py-2 active:text-blue-primary"
                                    href="{{ route('location') }}">Lokasi</a>
                                <a class="nav-link px-4 py-2 active:text-blue-primary"
                                    href="{{ route('blog') }}">Blog</a>
                                <a class="nav-link px-4 py-2 active:text-blue-primary"
                                    href="{{ route('schedule') }}">Jadwal</a>
                                <!-- Pelayanan Dropdown -->
                                <div class="relative group mx-auto">
                                    <button class="nav-link px-4 py-2 active:text-blue-primary flex items-center">
                                        Pelayanan
                                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div
                                        class="absolute py-2 hidden group-hover:block bg-white shadow-md text-left rounded-lg border-2 border-pink-primary w-44">
                                        <a class="block px-4 py-2 active:text-blue-primary text-black hover:bg-pink-secondary"
                                            href="{{ route('service.umum') }}">Umum</a>
                                        <a class="block px-4 py-2 active:text-blue-primary text-black hover:bg-pink-secondary"
                                            href="{{ route('service.adult') }}">Dewasa</a>
                                        <a class="block px-4 py-2 active:text-blue-primary2 text-black hover:bg-pink-secondary"
                                            href="{{ route('service.child') }}">Anak-anak</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Normal Navbar Links for Larger Screens -->
                        <div class="isi-navbar hidden lg:flex lg:items-center text-pink-primary font-bold ">
                            <a class="nav-link px-6 py-2  duration-300" data-link-alt="Home"
                                href="{{ route('home') }}"><span>Home</span></a>
                            <a class="nav-link px-6 py-2  duration-300" data-link-alt="Lokasi"
                                href="{{ route('location') }}"><span>Lokasi</span></a>
                            <div class="group">
                                <a class="pelayanan nav-link px-6 py-2 flex items-center duration-300 cursor-pointer"
                                    data-link-alt="Pelayanan">
                                    <span>Pelayanan</span>
                                </a>
                                <div
                                    class="dropdown absolute peer py-2 hidden group-hover:block bg-white shadow-md text-left rounded-lg border-2 border-pink-primary w-44">
                                    <a class="block px-4 py-2 text-black hover:bg-pink-secondary"
                                        href="{{ route('service.umum') }}">Umum</a>
                                    <a class="block px-4 py-2 text-black hover:bg-pink-secondary"
                                        href="{{ route('service.adult') }}">Dewasa</a>
                                    <a class="block px-4 py-2 text-black hover:bg-pink-secondary"
                                        href="{{ route('service.child') }}">Anak-anak</a>
                                </div>
                            </div>
                            <a class="nav-link px-6 py-2  duration-300" data-link-alt="Blog"
                                href="{{ route('blog') }}"><span>Blog</span></a>
                            <a class="nav-link px-6 py-2  duration-300" data-link-alt="Jadwal"
                                href="{{ route('schedule') }}"><span>Jadwal</span></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <script>
            // Offcanvas / Drawer toggler
            function toggleNavbar() {
                $('#offcanvas-navbar').toggleClass('-translate-y-full');
            }
        </script>

        <!-- Buat atas halaman  -->
        <div style="min-height: 77px;">
        </div>


        <!-- Konten Halaman -->
        <div class="d-flex justify-content-center align-items-center">
            <div class="text-center main-content overflow-x-hidden">
                @yield('content')
            </div>
        </div>
        <!-- konten halaman ends  -->



        <!-- Footer -->
        <footer class="bg-pink-secondary py-8 px-4 rounded-t-3xl">
            <div class="max-w-6xl mx-auto gap-4 text-left  text-blue-primary">

                <!-- Logo Section -->
                <div>
                    <h2 class="text-4xl font-bold mb-12">Zerlinda Dental Care</h2>
                </div>

                <div class="md:flex md:justify-between block">
                    <!-- Halaman Lain -->
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Halaman Lain :</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('service.adult') }}" class="hover:text-pink-primary">Pelayanan
                                    Dewasa</a></li>
                            <li><a href="{{ route('service.child') }}" class="hover:text-pink-primary">Pelayanan
                                    Anak</a></li>
                            <li><a href="{{ route('service.umum') }}" class="hover:text-pink-primary">Pelayanan
                                    Umum</a></li>
                            <li><a href="{{ route('schedule') }}" class="hover:text-pink-primary">Jadwal Dokter</a></li>
                            <li><a href="{{ route('blog') }}" class="hover:text-pink-primary">Blog</a></li>
                        </ul>
                    </div>

                    <!-- Kontak -->
                    <div class="contact">
                        <h3 class="text-xl font-semibold mb-4">Kontak :</h3>
                        <ul>
                            @foreach ($contacts as $contact)
                                <li class="flex items-center mb-4">
                                    <span>
                                        <img src="{{ asset('icons/icon_' . strtolower($contact->jenis_kontak) . '_.png') }}"
                                            alt="{{ $contact->jenis_kontak }} Icon" class="w-7 me-4">
                                    </span>
                                    @if ($contact->url)
                                        <a href="{{ $contact->url }}" target="_blank"
                                            class="hover:text-pink-primary">{{ $contact->nama_akun }}</a>
                                    @else
                                        <span>{{ $contact->nama_akun }}</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                    </div>

                    <!-- Jadwal Klinik & Lokasi Klinik -->
                    <div>
                        <h3 class="text-xl font-semibold  mb-4">Jadwal Klinik :</h3>
                        <p class="">Senin - Jumat : 08:00 - 21:00</p>
                        <p class="">Sabtu : 08:00 - 12:00</p>

                        <h3 class="text-xl font-semibold  mt-6 mb-4">Lokasi Klinik :</h3>
                        <p class="">Pucung, Tamanmartani, Kec. Kalasan,<br> Kabupaten Sleman, Daerah Istimewa <br>
                            Yogyakarta</p>
                    </div>
                </div>

                <!-- copyright & credit  -->
                <div class="md:flex justify-between mt-12">
                    <p>&copy; Zerlinda Dental Care 2024</p>
                    <p style="margin-right: 70px">Developed by NPN</p>
                </div>
            </div>
        </footer>
        <!-- footer ends  -->



        <!-- Ikon WhatsApp di pojok kanan bawah -->
        @php
            $url = \App\Models\kontak::where('jenis_kontak', 'whatsapp')->value('url');
        @endphp
        <a href="{{$url}}" target="_blank" class="fixed bottom-5 right-5 group">
            <div class="bg-pink-primary text-white p-4 rounded-full hover:scale-105 shadow-lg transition duration-300">
                <!-- SVG Ikon WhatsApp -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24">
                    <path
                        d="M20.52 3.47A11.42 11.42 0 0012 0a11.42 11.42 0 00-8.48 3.47A11.56 11.56 0 000 12.06a11.25 11.25 0 001.56 5.77L.03 24l6.4-1.66a11.5 11.5 0 005.57 1.44h.01a11.56 11.56 0 008.47-3.47A11.56 11.56 0 0024 12.06a11.42 11.42 0 00-3.48-8.59zM12 21.45a9.77 9.77 0 01-5-1.36l-.36-.21-3.8 1 1-3.7-.24-.38A9.9 9.9 0 012.4 12.06a9.92 9.92 0 012.93-7.07A9.77 9.77 0 0112 2.28c2.63 0 5.1 1.03 7 2.91a9.77 9.77 0 012.92 7.07c0 2.64-1.03 5.12-2.92 7.01a9.82 9.82 0 01-7 2.91zm5.38-7.71c-.3-.15-1.78-.88-2.06-.98s-.48-.15-.68.15-.78.98-.96 1.18-.35.22-.65.07a8.12 8.12 0 01-2.38-1.47 8.64 8.64 0 01-1.6-1.99c-.16-.3 0-.45.14-.6.13-.13.3-.34.45-.52.15-.17.2-.3.3-.5s.05-.38-.02-.52c-.07-.15-.68-1.65-.94-2.27-.25-.6-.5-.5-.68-.5h-.58c-.2 0-.5.07-.76.38s-1 1-.98 2.42 1.03 2.78 1.17 2.98c.15.2 2.03 3.1 4.9 4.34.68.3 1.2.48 1.6.62.67.21 1.28.18 1.75.11.54-.08 1.78-.73 2.03-1.44.25-.7.25-1.3.18-1.44-.08-.15-.28-.22-.58-.37z" />
                </svg>
            </div>
            <div class="hidden group-hover:block">
                <div
                    class="group absolute -top-16 left-1/2 z-50 flex -translate-x-1/2 flex-col items-center rounded-sm text-center text-sm text-slate-300 before:-top-2">
                    <div class="rounded-sm bg-black py-1 px-2">
                        <p class="whitespace-nowrap">Chat via <br> Whatsapp</p>
                    </div>
                    <div class="h-0 w-fit border-l-8 border-r-8 border-t-8 border-transparent border-t-black"></div>
                </div>
            </div>
        </a>
        <!-- ikon whatsapp  -->
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>