@extends('layout.user')

@section('title', 'Zerlinda Dental')

@section('content')
<!-- Hero section  -->
<div id="wrapper" class="relative h-screen flex items-center">
    <div id="slider-area" class="owl-carousel absolute h-screen w-full top-0 left-0 -z-10 ">
        @foreach ($images as $image)
            <div style="background-image: url('{{ asset('storage/' . $image->url_media) }}')"></div>
        @endforeach
    </div>
    <div class="slider-text z-10 text-left mx-5 md:mx-12" data-aos="fade-up" data-aos-delay="100">
        <h1 data-aos="fade-left" class="text-white font-semibold lg:text-8xl md:text-6xl text-4xl">
            Selamat Datang
        </h1>
        <p class="text-white lg:text-3xl md:text-xl text-base mt-4" data-aos="fade-right">Kami hadir untuk
            menghadirkan senyum indah dan percaya diri dengan layanan estetika gigi
            berkualitas tinggi. Di Zerlinda Dental Care, kami percaya bahwa senyum adalah aset berharga yang
            mampu meningkatkan rasa percaya diri
            dan memancarkan kepribadian Anda.</p>
    </div>
</div>
<!-- jquery untuk owl carousel  -->
<script>
    $(document).ready(function () {
        $('#slider-area').owlCarousel({
            loop: true,
            autoplay: true,
            dots: false,
            items: 1
        });
    });
</script>
<!-- Hero section ends  -->



<!-- Quotes section -->
<section class="my-40 flex items-center mx-12" data-aos="fade-up">
    <div class="">
        <hr class="border-2 border-pink-primary w-3/4 mx-auto my-6">
        <p class="lg:text-5xl md:text-3xl text-xl text-pink-primary">Kami percaya bahwa setiap senyum itu unik, dan
            tujuan
            kami adalah menciptakan senyum terbaik melalui perawatan gigi yang nyaman, modern, dan tentunya berkualitas
            tinggi.</p>
        <hr class="border-2 border-pink-primary w-1/2 mx-auto my-6">
    </div>
</section>
<!-- Quotes section ends -->



<!-- Service section  -->
<section class="my-40 flex items-center">
    <div class="container mx-auto">
        <!-- buttons for adult and child  -->
        <div class="flex justify-center">
            <div class="flex justify-between space-x-4">
                <button id="button-dewasa" data-aos="fade-right"
                    class="py-2 md:px-12 px-6 md:text-xl font-bold rounded-full bg-pink-primary text-white hover:ring-2 hover:ring-pink-primary">
                    DEWASA
                </button>
                <button id="button-anak" data-aos="fade-left"
                    class="py-2 md:px-12 px-6 md:text-xl font-bold rounded-full bg-pink-secondary text-pink-primary hover:ring-2 hover:ring-pink-primary">
                    ANAK-ANAK
                </button>
            </div>
        </div>


        <!-- Adult section -->
        <div id="dewasa-section" class="">
            <div data-aos="fade-right" data-aos-delay="500"
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mt-10">
                @foreach ($layanan2_dewasa as $service)                                
                    <a href="{{ route('service.show', $service->id_layanan) }}"
                        class="hover:scale-105 transition duration-300 hover:opacity-80 block py-6 cursor-pointer">
                        <div class="flex justify-center items-center ">
                            @if ($galeri = $service->galeri_layanan->first())
                                <img src="{{ asset('storage/' . $galeri->url_media) }}" alt="Circular Image"
                                    class="xl:size-[250px] size-[200px] rounded-full object-cover">
                            @endif
                        </div>
                        <p class="font-bold md:text-3xl text-xl text-pink-primary mt-12">{{ $service->nama_layanan }}
                        </p>
                    </a>
                @endforeach

                <!-- lainnya  -->
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
        </div>


        <!-- Child section -->
        <div id="anak-section" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mt-10 hidden">
            @foreach ($layanan2_anak as $service)                        
                <a href="{{ route('service.show', $service->id_layanan) }}"
                    class="hover:scale-105 transition duration-300 hover:opacity-80 block py-6 cursor-pointer">
                    <div class="flex justify-center items-center ">
                        @if ($galeri = $service->galeri_layanan->first())
                            <img src="{{ asset('storage/' . $galeri->url_media) }}" alt="Circular Image"
                                class="xl:size-[250px] size-[200px] rounded-full object-cover">
                        @endif
                    </div>
                    <p class="font-bold md:text-3xl text-xl text-pink-primary mt-12">{{ $service->nama_layanan }}</p>
                </a>
            @endforeach

            <!-- lainnya  -->
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

    <!-- jquery untuk menampilkan dewasa /Anak-Anak  -->
    <script>
        const buttonDewasa = $('#button-dewasa');
        const buttonAnak = $('#button-anak');
        const dewasaSection = $('#dewasa-section');
        const anakSection = $('#anak-section');

        buttonDewasa.on('click', function () {
            // Tampilkan bagian Dewasa dan sembunyikan Anak-Anak
            dewasaSection.removeClass('hidden');
            anakSection.addClass('hidden');

            // Tambahkan kelas aktif pada tombol Dewasa, hilangkan dari Anak-Anak
            buttonDewasa.addClass('bg-pink-primary text-white')
                .removeClass('bg-pink-secondary text-pink-primary');
            buttonAnak.addClass('bg-pink-secondary text-pink-primary')
                .removeClass('bg-pink-primary text-white');
        });

        buttonAnak.on('click', function () {
            // Tampilkan bagian Anak-Anak dan sembunyikan Dewasa
            anakSection.removeClass('hidden');
            dewasaSection.addClass('hidden');

            // Tambahkan kelas aktif pada tombol Anak-Anak, hilangkan dari Dewasa
            buttonAnak.addClass('bg-pink-primary text-white')
                .removeClass('bg-pink-secondary text-pink-primary');
            buttonDewasa.addClass('bg-pink-secondary text-pink-primary')
                .removeClass('bg-pink-primary text-white');
        });
    </script>
</section>
<!-- Service section ends  -->




<!-- Artikel  -->
<div class="w-4/5 mx-auto min-h-[300px] my-40">
    <!-- judul & arrow  -->
    <div class="flex justify-between">
        <h2 class="md:text-3xl text-xl font-bold text-pink-primary mb-4" data-aos="fade-right">
            Informasi Terbaru
        </h2>
        <div data-aos="fade-left">
            <button id="customPrevBtn"
                class="bg-pink-primary hover:bg-pink-800 text-white rounded-full md:py-2 md:px-4 py-1 px-2 mr-2">
                <span>&lt;</span>
            </button>
            <button id="customNextBtn"
                class="bg-pink-primary hover:bg-pink-800 text-white rounded-full md:py-2 md:px-4 py-1 px-2">
                <span>&gt;</span>
            </button>
        </div>
    </div>

    <!-- artikel section  -->
    <div id="wrapper" class="relative h-full w-full flex items-center" data-aos="fade-up" data-aos-delay="500">
        <div id="slider-area-artikel" class="owl-carousel absolute  w-full top-0 left-0  ">
            @foreach ($artikels as $artikel)                        
                <a href="{{ route('blog.show', $artikel->id_artikel) }}" class="">
                    <div
                        class="bg-pink-secondary rounded-lg hover:rounded-[45px] h-[240px] duration-300 overflow-hidden shadow-lg">
                        <img src="{{ asset('storage/' . $artikel->url_media) }}" alt="Gambar"
                            class="w-full h-40 object-cover">
                        <div class="p-4">
                            <p class="font-semibold">{{ $artikel->judul }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
<!-- jquery untuk article carousel  -->
<script>
    $(document).ready(function () {
        const owl = $('#slider-area-artikel');
        owl.owlCarousel({
            loop: true,
            autoplay: true,
            autoplayHoverPause: true,
            margin: 20,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,

                },
                600: {
                    items: 2
                },
                960: {
                    items: 3
                }
            }
        });

        $('#customPrevBtn').click(function () {
            owl.trigger('prev.owl.carousel');  // Pindah ke slide sebelumnya
        });

        $('#customNextBtn').click(function () {
            owl.trigger('next.owl.carousel');  // Pindah ke slide berikutnya
        });
    });
</script>
<!-- Artikel ends  -->




<!-- Testimoni  -->
<section class="my-40">
    <div class="text-start w-4/5 mx-auto">
        <h2 class="text-3xl font-bold text-pink-600 mb-4" data-aos="fade-right">
            Testimoni Pasien
        </h2>
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-9" data-aos="fade-up" data-aos-delay="500">
            <div class="p-10 rounded-xl bg-pink-secondary hover:scale-110 duration-300">
                <p class="text-xl mb-12">
                    Pelayanan di Zerlinda Dental Care sangat ramah dan profesional,
                    tempatnya bersih dan nyaman sekali.
                </p>
                <div class="flex items-center">
                    <img class="size-[75px] rounded-full ring-2 ring-blue-primary "
                        src="{{ asset('images/person_3.png') }}" alt="">
                    <h2 class="ms-4 font-bold text-xl">Nino</h2>
                </div>
            </div>
            <div class="p-10 rounded-xl bg-pink-secondary hover:scale-110 duration-300">
                <p class="text-xl mb-12">
                    Perawatan gigi di Zerlinda Dental Care sangat memuaskan,
                    hasilnya rapi dengan dokter yang berpengalaman.
                </p>
                <div class="flex items-center">
                    <img class="size-[75px] rounded-full ring-2 ring-blue-primary "
                        src="{{ asset('images/person_4.png') }}" alt="">
                    <h2 class="ms-4 font-bold text-xl">Naufal</h2>
                </div>
            </div>
            <div class="p-10 rounded-xl bg-pink-secondary hover:scale-110 duration-300">
                <p class="text-xl mb-12">
                    Tempatnya modern dan steril, pelayanan cepat dan perawatan
                    di Zerlinda Dental Care sangat berkualitas.
                </p>
                <div class="flex items-center">
                    <img class="size-[75px] rounded-full ring-2 ring-blue-primary "
                        src="{{ asset('images/person_5.png') }}" alt="">
                    <h2 class="ms-4 font-bold text-xl">Queen Elizabeth II</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimoni ends  -->




<!-- Lokasi  -->
<div class="my-40 flex flex-col items-center justify-center text-start text-pink-primary">
    <div class="w-4/5">
        <h1 class=" text-3xl font-bold mb-4 " data-aos="fade-right">
            Lokasi Klinik
        </h1>
        <div class="md:border-4 border-2 border-pink-secondary h-450 rounded-3xl " data-aos="fade-up"
            data-aos-delay="500">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d11182.850707198562!2d110.4820929790275!3d-7.711581817977542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwNDInNDQuMiJTIDExMMKwMjknMDAuNCJF!5e0!3m2!1sid!2sid!4v1734955420708!5m2!1sid!2sid"
                width="100%" height="100%" class="rounded-3xl " style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <p class="text-base mt-4" data-aos="fade-up">Pucung, Tamanmartani, Kec. Kalasan, Kabupaten Sleman, Daerah Istimewa
        Yogyakarta</p>
    </div>
</div>
<!-- Lokasi ends  -->
@endsection