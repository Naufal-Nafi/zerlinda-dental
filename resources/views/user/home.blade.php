@extends('layout.user')

@section('title', 'Zerlinda Dental')

@section('content')
<section id="hero" class="min-h-screen flex items-end ">
    <div class="hero-2">
        <div class=" mx-auto block mb-10 mx-10 ">
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
<section class="min-h-screen flex items-center">
    <div class="mx-auto">
        <hr class="border-2 border-pink-primary w-3/4 mx-auto my-6">
        <p class="lg:text-5xl md:text-3xl text-xl text-pink-primary">Kami percaya bahwa setiap senyum itu unik, dan tujuan
            kami adalah menciptakan senyum terbaik melalui perawatan gigi yang nyaman, modern, dan tentunya berkualitas
            tinggi.</p>
        <hr class="border-2 border-pink-primary w-1/2 mx-auto my-6">
    </div>
</section>
<!-- kata-kata mutiara ends -->

<section class="min-h-screen flex items-center">
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="flex justify-between space-x-4">
                <button class="bg-pink-primary text-pink-secondary py-2 px-4 rounded-full">DEWASA</button>
                <button class="bg-pink-secondary text-pink-primary py-2 px-4 rounded-full">ANAK-ANAK</button>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 mt-10">
            <div class="bg-pink-primary p-4 rounded-md">1</div>
            <div class="bg-pink-secondary p-4 rounded-md">2</div>
            <div class="bg-pink-primary p-4 rounded-md">3</div>
        </div>
    </div>
</section>


@endsection