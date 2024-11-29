@extends('layout.user')
@section('content')
<div class="min-h-screen w-4/5 mx-auto ">
    <!-- Judul & Search Bar -->
    <div class="md:flex justify-between md:mt-20 mt-12">
        <h1 class="lg:text-4xl md:text-3xl text-xl text-pink-primary text-start font-bold mb-4">Postingan Terkini</h1>
        <form action="" method="GET" class="relative mb-4 md:w-1/2">
            <input type="text" name="keyword" placeholder="Search articles..."
                class="border border-black rounded-lg p-2  w-full" value="{{ request('keyword') }}">
            <button type="submit" class="absolute inset-y-0 right-0 pl-2 flex items-center me-4">
                <img src="{{ asset('icons/icon_search.png') }}" alt="Search Icon" class="w-5 h-5">
            </button>
        </form>
    </div>

    <!-- Blog paling atas  -->
    <div class="md:h-[630px] h-[350px] md:border-4 md:rounded-[65px] rounded-xl border-pink-secondary my-12 hover:opacity-80 duration-300 cursor-pointer">
        <a href="{{ route('blog.show') }}">
            <img class="w-full h-4/5 md:rounded-t-[60px] rounded-t-xl object-cover" src="{{ asset('images/artikel_1.png') }}" alt="">
            <div class="h-1/5 bg-pink-secondary md:rounded-b-[60px] rounded-b-xl flex flex-col justify-center">
                <p class="text-lg font-bold">Kekuatan Senyuman: Pentingnya Kesehatan Gigi untuk Kepercayaan Diri</p>
            </div>
        </a>
    </div>

    <!-- 3 blog kedua  -->
    <div class="grid md:grid-cols-3 grid-cols-1 gap-9">
        <div class="xl:h-[400px] h-[350px] rounded-xl hover:rounded-3xl hover:opacity-80 duration-300 cursor-pointer bg-pink-secondary">
            <a href="{{ route('blog.show') }}">
                <img class="w-full h-4/5 rounded-t-xl object-cover" src="{{ asset('images/artikel_2.png') }}" alt="">
                <div class="h-1/5 bg-pink-secondary rounded-b-xl flex flex-col justify-center">
                    <p class="line-clamp-2">Rahasia senyum yang memikat</p>
                </div>
            </a>
        </div>        
        <div class="xl:h-[400px] h-[350px] rounded-xl hover:opacity-80 duration-300 cursor-pointer bg-pink-secondary">
            <a href="{{ route('blog.show') }}">
                <img class="w-full h-4/5 rounded-t-xl object-cover" src="{{ asset('images/artikel_3.png') }}" alt="">
                <div class="h-1/5 bg-pink-secondary rounded-b-xl flex flex-col justify-center">
                    <p class="line-clamp-2">Pentingnya Sikat Gigi Setiap Hari</p>
                </div>
            </a>
        </div>        
        <div class="xl:h-[400px] h-[350px] rounded-xl hover:opacity-80 duration-300 cursor-pointer bg-pink-secondary">
            <a href="{{ route('blog.show') }}">
                <img class="w-full h-4/5 rounded-t-xl object-cover" src="{{ asset('images/artikel_4.png') }}" alt="">
                <div class="h-1/5 bg-pink-secondary rounded-b-xl flex flex-col justify-center">
                    <p class="line-clamp-2">Tindakan Dokter untuk Gigi Sehat</p>
                </div>
            </a>
        </div>
    </div>
</div>


<!-- Blog lainnya  -->
<div class="my-12 bg-pink-secondary bg-opacity-20 ">
    <div class="w-4/5 mx-auto ">
        <!-- for each -->
        <div class="w-full py-8 hover:opacity-80 duration-300 cursor-pointer">
            <a href="{{ route('blog.show') }}" class="md:flex block">
                <img class="md:w-1/4 h-full rounded-[50px] object-cover border-2 border-pink-secondary me-8"
                src="{{ asset('images/artikel_5.png') }}" alt="">
                <div class="md:text-left flex flex-col justify-center">
                    <h5 class="text-pink-primary font-bold text-3xl my-2">Cara Tepat Memilih Sikat Gigi</h5>
                    <p class="text-justify line-clamp-3">
                        Memilih sikat gigi yang tepat adalah langkah penting dalam menjaga 
                        kesehatan gigi dan mulut. Sikat gigi yang sesuai dapat membantu 
                        membersihkan plak...
                    </p>
                </div>
            </a>
        </div>
        <!-- end for each  -->
         
        <!-- contoh tambahan  -->
        <div class="w-full py-8  hover:opacity-80 duration-300 cursor-pointer">
            <a href="{{ route('blog.show') }}" class="md:flex block">
                <img class="md:w-1/4 h-full rounded-[50px] object-cover border-2 border-pink-secondary me-8"
                src="{{ asset('images/artikel_6.png') }}" alt="">
                <div class="md:text-left flex flex-col justify-center">
                    <h5 class="text-pink-primary font-bold text-3xl my-2">Fungsi Ronsen Gigi dalam Perawatan</h5>
                    <p class="text-justify line-clamp-3">
                        Ronsen gigi merupakan alat diagnostik penting dalam perawatan 
                        kesehatan gigi dan mulut. Dengan teknologi ini, dokter gigi 
                        dapat melihat kondisi gigi, gusi, dan tulang rahang yang tidak...
                    </p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection