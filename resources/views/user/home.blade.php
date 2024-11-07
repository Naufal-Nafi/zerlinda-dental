@extends('layout.user')

@section('title', 'Zerlinda Dental')

@section('content')
<!-- <section class="min-h-screen carousel">
    <div class="clist">
        <div class="citem">
            <img src="{{ asset('images/landing-page.png') }}" alt="">
        </div>
        <div class="citem">
            <img src="{{ asset('images/landing-page.png') }}" alt="">
        </div>
        <div class="citem">
            <img src="{{ asset('images/landing-page.png') }}" alt="">
        </div>
        <div class="citem">
            <img src="{{ asset('images/landing-page.png') }}" alt="">
        </div>
        <div class="citem">
            <img src="{{ asset('images/landing-page.png') }}" alt="">
        </div>
    </div>

</section> -->

<section id="hero" class="min-h-screen flex items-end ">
    <div class="hero-2">
        <div class=" mx-4 block mb-10 mx-10 ">
            <div class="text-left">
                <h1 data-aos="fade-left" class="text-white font-semibold lg:text-8xl md:text-6xl text-4xl">
                    Selamat Datang
                </h1>
                <p class="text-white lg:text-3xl md:text-xl text-base" data-aos="fade-right">Kami hadir untuk
                    menghadirkan senyum indah dan percaya diri dengan layanan estetika gigi
                    berkualitas tinggi. Di Zerlinda Dental Care, kami percaya bahwa senyum adalah aset berharga yang
                    mampu meningkatkan rasa percaya diri
                    dan memancarkan kepribadian Anda.</p>
            </div>
        </div>
    </div>
</section>


<!-- kata-kata mutiara -->
<section class="my-40 flex items-center">
    <div class="mx-auto">
        <hr class="border-2 border-pink-primary w-3/4 mx-auto my-6">
        <p class="lg:text-5xl md:text-3xl text-xl text-pink-primary">Kami percaya bahwa setiap senyum itu unik, dan
            tujuan
            kami adalah menciptakan senyum terbaik melalui perawatan gigi yang nyaman, modern, dan tentunya berkualitas
            tinggi.</p>
        <hr class="border-2 border-pink-primary w-1/2 mx-auto my-6">
    </div>
</section>
<!-- kata-kata mutiara ends -->


<!-- Pelayanan  -->
<section class="min-h-screen flex items-center">
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="flex justify-between space-x-4">
                <!-- <button id="button-dewasa"
                    class="bg-pink-secondary text-pink-primary focus:bg-pink-primary focus:text-pink-secondary active:bg-pink-primary active:text-pink-secondary
                    hover:bg-pink-primary hover:text-pink-secondary duration-300 py-2 px-4 rounded-full ">DEWASA</button>
                <button id="button-anak"
                    class="bg-pink-secondary text-pink-primary focus:bg-pink-primary focus:text-pink-secondary 
                    hover:bg-pink-primary hover:text-pink-secondary duration-300 py-2 px-4 rounded-full">ANAK-ANAK</button> -->
                <button id="button-dewasa"
                    class="py-2 px-4 rounded-full bg-pink-primary text-white hover:ring-2 hover:ring-pink-primary">DEWASA</button>
                <button id="button-anak"
                    class="py-2 px-4 rounded-full bg-pink-secondary text-pink-primary hover:ring-2 hover:ring-pink-primary">ANAK-ANAK</button>
            </div>
        </div>

        <!-- Dewasa -->
        <div id="dewasa-section" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mt-10">
            <a href="{{ route('service.show') }}"
                class="hover:scale-105 transition duration-300 hover:opacity-80 block py-6 cursor-pointer">
                <div class="flex justify-center items-center ">
                    <img src="{{ asset('images/landing-page.png') }}" alt="Circular Image"
                        class="xl:size-[250px] size-[200px] rounded-full object-cover">
                </div>
                <p class="font-bold md:text-3xl text-xl text-pink-primary mt-12">Gigi Tiruan dewasa</p>
            </a>
            <!-- Tambahkan konten lainnya sesuai kebutuhan -->
            <a href="{{ route('service.show') }}"
                class="hover:scale-105 transition duration-300 hover:opacity-80 block py-6 cursor-pointer">
                <div class="flex justify-center items-center ">
                    <img src="{{ asset('images/landing-page.png') }}" alt="Circular Image"
                        class="xl:size-[250px] size-[200px] rounded-full object-cover">
                </div>
                <p class="font-bold md:text-3xl text-xl text-pink-primary mt-12">Gigi Tiruan</p>
            </a>
            <a href="{{ route('service.adult') }}"
                class="hover:scale-105 transition duration-300 hover:opacity-80 block py-6 cursor-pointer">
                <div class="flex justify-center items-center">
                    <svg class="xl:size-[250px] size-[200px] p-12 bg-pink-secondary rounded-full" width="75"
                        height="130" viewBox="0 0 75 130" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.86799 2.8615C1.03161 4.69427 0 7.17971 0 9.77125C0 12.3628 1.03161 14.8482 2.86799 16.681L51.3557 65.059L2.86799 113.437C1.08366 115.28 0.0963264 117.749 0.118645 120.312C0.140963 122.874 1.17115 125.325 2.98731 127.137C4.80348 128.95 7.26032 129.977 9.82867 130C12.397 130.022 14.8714 129.037 16.7188 127.257L72.132 71.9688C73.9684 70.136 75 67.6505 75 65.059C75 62.4675 73.9684 59.982 72.132 58.1493L16.7188 2.8615C14.8819 1.02928 12.3908 0 9.79341 0C7.19599 0 4.70492 1.02928 2.86799 2.8615Z"
                            fill="#DA0C81" />
                    </svg>
                </div>
                <p class="font-bold md:text-3xl text-xl text-pink-primary mt-12">lainnya</p>
            </a>
        </div>

        <!-- Anak-Anak -->
        <div id="anak-section" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mt-10 hidden">
            <a href="{{ route('service.show') }}"
                class="hover:scale-105 transition duration-300 hover:opacity-80 block py-6 cursor-pointer">
                <div class="flex justify-center items-center ">
                    <img src="{{ asset('images/landing-page.png') }}" alt="Circular Image"
                        class="xl:size-[250px] size-[200px] rounded-full object-cover">
                </div>
                <p class="font-bold md:text-3xl text-xl text-pink-primary mt-12">Gigi Tiruan anak</p>
            </a>
            <!-- Tambahkan konten lainnya sesuai kebutuhan -->
            <a href="{{ route('service.show') }}"
                class="hover:scale-105 transition duration-300 hover:opacity-80 block py-6 cursor-pointer">
                <div class="flex justify-center items-center ">
                    <img src="{{ asset('images/landing-page.png') }}" alt="Circular Image"
                        class="xl:size-[250px] size-[200px] rounded-full object-cover">
                </div>
                <p class="font-bold md:text-3xl text-xl text-pink-primary mt-12">Gigi Tiruan</p>
            </a>
            <a href="{{ route('service.child') }}"
                class="hover:scale-105 transition duration-300 hover:opacity-80 block py-6 cursor-pointer">
                <div class="flex justify-center items-center">
                    <svg class="xl:size-[250px] size-[200px] p-12 bg-pink-secondary rounded-full" width="75"
                        height="130" viewBox="0 0 75 130" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.86799 2.8615C1.03161 4.69427 0 7.17971 0 9.77125C0 12.3628 1.03161 14.8482 2.86799 16.681L51.3557 65.059L2.86799 113.437C1.08366 115.28 0.0963264 117.749 0.118645 120.312C0.140963 122.874 1.17115 125.325 2.98731 127.137C4.80348 128.95 7.26032 129.977 9.82867 130C12.397 130.022 14.8714 129.037 16.7188 127.257L72.132 71.9688C73.9684 70.136 75 67.6505 75 65.059C75 62.4675 73.9684 59.982 72.132 58.1493L16.7188 2.8615C14.8819 1.02928 12.3908 0 9.79341 0C7.19599 0 4.70492 1.02928 2.86799 2.8615Z"
                            fill="#DA0C81" />
                    </svg>
                </div>
                <p class="font-bold md:text-3xl text-xl text-pink-primary mt-12">lainnya</p>
            </a>
        </div>
    </div>

    <script>
        const buttonDewasa = document.getElementById('button-dewasa');
        const buttonAnak = document.getElementById('button-anak');
        const dewasaSection = document.getElementById('dewasa-section');
        const anakSection = document.getElementById('anak-section');

        buttonDewasa.addEventListener('click', function () {
            // Tampilkan bagian Dewasa dan sembunyikan Anak-Anak
            dewasaSection.classList.remove('hidden');
            anakSection.classList.add('hidden');

            // Tambahkan kelas aktif pada tombol Dewasa, hilangkan dari Anak-Anak
            buttonDewasa.classList.add('bg-pink-primary', 'text-white');
            buttonDewasa.classList.remove('bg-pink-secondary', 'text-pink-primary');
            buttonAnak.classList.add('bg-pink-secondary', 'text-pink-primary');
            buttonAnak.classList.remove('bg-pink-primary', 'text-white');
        });

        buttonAnak.addEventListener('click', function () {
            // Tampilkan bagian Anak-Anak dan sembunyikan Dewasa
            anakSection.classList.remove('hidden');
            dewasaSection.classList.add('hidden');

            // Tambahkan kelas aktif pada tombol Anak-Anak, hilangkan dari Dewasa
            buttonAnak.classList.add('bg-pink-primary', 'text-white');
            buttonAnak.classList.remove('bg-pink-secondary', 'text-pink-primary');
            buttonDewasa.classList.add('bg-pink-secondary', 'text-pink-primary');
            buttonDewasa.classList.remove('bg-pink-primary', 'text-white');
        });
    </script>

</section>
<!-- Pelayanan ends  -->




<!-- Artikel  -->
<section class="my-40">
    <div class="w-4/5 mx-auto">
        <div class="flex justify-between">
            <h2 class="text-2xl font-bold text-pink-600 mb-4">Informasi Terbaru</h2>
            <div>
                <button onclick="prevSlide()" class="bg-pink-600 text-white rounded-full py-2 px-4 mr-2">
                    <span>&lt;</span>
                </button>
                <button onclick="nextSlide()" class="bg-pink-600 text-white rounded-full py-2 px-4">
                    <span>&gt;</span>
                </button>
            </div>
        </div>

        <!-- Carousel Section -->
        <div class="relative carousel-container flex" id="carousel">
            <!-- Slide Items -->
            <div class="flex-shrink-0 w-1/3 p-2">
                <div class="bg-pink-200 rounded-lg overflow-hidden shadow-lg">
                    <img src="https://via.placeholder.com/300" alt="Gambar" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <p class="text-gray-700 font-semibold">Cara Agar Gigi Palsu Tidak Lepas</p>
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0 w-1/3 p-2">
                <div class="bg-pink-200 rounded-lg overflow-hidden shadow-lg">
                    <img src="https://via.placeholder.com/300" alt="Gambar" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <p class="text-gray-700 font-semibold">Cara Agar Gigi Palsu Tidak Lepas</p>
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0 w-1/3 p-2">
                <div class="bg-pink-200 rounded-lg overflow-hidden shadow-lg">
                    <img src="https://via.placeholder.com/300" alt="Gambar" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <p class="text-gray-700 font-semibold">Cara Agar Gigi Palsu Tidak Lepas</p>
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0 w-1/3 p-2">
                <div class="bg-pink-200 rounded-lg overflow-hidden shadow-lg">
                    <img src="https://via.placeholder.com/300" alt="Gambar" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <p class="text-gray-700 font-semibold">Cara Agar Gigi Palsu Tidak Lepas</p>
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0 w-1/3 p-2">
                <div class="bg-pink-200 rounded-lg overflow-hidden shadow-lg">
                    <img src="https://via.placeholder.com/300" alt="Gambar" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <p class="text-gray-700 font-semibold">Cara Agar Gigi Palsu Tidak Lepas</p>
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0 w-1/3 p-2">
                <div class="bg-pink-200 rounded-lg overflow-hidden shadow-lg">
                    <img src="https://via.placeholder.com/300" alt="Gambar" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <p class="text-gray-700 font-semibold">Cara Agar Gigi Palsu Tidak Lepas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const carousel = document.getElementById('carousel');
    const itemWidth = carousel.clientWidth / 3; // Mengatur lebar setiap item slide
    let scrollAmount = 0;

    function nextSlide() {
        scrollAmount += itemWidth;
        if (scrollAmount >= carousel.scrollWidth - itemWidth) {
            scrollAmount = 0;
        }
        carousel.scrollTo({ left: scrollAmount, behavior: 'smooth' });
    }

    function prevSlide() {
        scrollAmount -= itemWidth;
        if (scrollAmount < 0) {
            scrollAmount = carousel.scrollWidth - itemWidth * 3;
        }
        carousel.scrollTo({ left: scrollAmount, behavior: 'smooth' });
    }
</script>
<!-- Artikel ends  -->




<!-- Testimoni  -->
<section class="my-40">
    <div class="text-start w-4/5 mx-auto">
        <h2 class="text-2xl font-bold text-pink-600 mb-4">Testimoni Pasien</h2>
        <div class="grid md:grid-cols-3 grid-cols-1 gap-9">
            <div class="p-10 rounded-xl bg-pink-secondary">
                <p class="text-2xl mb-12">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                <div class="flex items-center">
                    <img class="size-[75px] rounded-full ring-2 ring-blue-primary " src="https://via.placeholder.com/300" alt="">
                    <h2 class="ms-4 font-bold text-2xl">LOREM</h2>
                </div>
            </div>
            <div class="p-10 rounded-xl bg-pink-secondary">
                <p class="text-2xl mb-12">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                <div class="flex items-center">
                    <img class="size-[75px] rounded-full ring-2 ring-blue-primary " src="https://via.placeholder.com/300" alt="">
                    <h2 class="ms-4 font-bold text-2xl">LOREM</h2>
                </div>
            </div>
            <div class="p-10 rounded-xl bg-pink-secondary">
                <p class="text-2xl mb-12">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                <div class="flex items-center">
                    <img class="size-[75px] rounded-full ring-2 ring-blue-primary " src="https://via.placeholder.com/300" alt="">
                    <h2 class="ms-4 font-bold text-2xl">LOREM</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimoni ends  -->





<!-- Lokasi  -->
<div class="min-h-screen flex flex-col items-center justify-center text-start text-pink-primary">
    <h1 class="md:text-5xl text-3xl font-bold md:my-20 my-12">Lokasi Klinik</h1>
    <div class="w-4/5">
        <p class="md:text-3xl text-xl font-bold mb-9">Kunjungi</p>
        <div class="md:border-4 border-2 border-pink-secondary h-450 rounded-3xl ">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13296.709523125111!2d110.37424616862342!3d-7.77546504897429!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59d1b10eefdd%3A0xe65afca3cae0ac31!2sDepartemen%20Teknik%20Elektro%20Dan%20Informatika%20UGM!5e0!3m2!1sid!2sid!4v1729664735391!5m2!1sid!2sid"
                width="100%" height="100%" class="rounded-3xl " style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <p class="text-base mt-4 md:mb-40 mb-20">Jalan Kalasan</p>
    </div>
</div>
<!-- Lokasi ends  -->
@endsection