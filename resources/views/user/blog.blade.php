@extends('layout.user')
@section('content')
<div class="min-h-screen w-4/5 mx-auto ">
    <!-- Judul & Search Bar -->
    <div class="flex justify-between md:mt-20 mt-12">
        <h1 class="md:text-4xl text-xl text-pink-primary font-bold">Postingan Terkini</h1>
        <form action="" method="GET" class="relative mb-4 w-1/2">
            <input type="text" name="keyword" placeholder="Search articles..."
                class="border border-black rounded-lg p-2  w-full" value="{{ request('keyword') }}">
            <button type="submit" class="absolute inset-y-0 right-0 pl-2 flex items-center me-4">
                <img src="{{ asset('icons/icon_search.png') }}" alt="Search Icon" class="w-5 h-5">
            </button>
        </form>
    </div>

    <!-- Blog paling atas  -->
    <div class="h-[630px] border-4 rounded-[65px] border-pink-secondary my-12">
        <a href="{{ route('blog.show') }}">
            <img class="w-full h-4/5 rounded-t-[60px] object-cover" src="{{ asset('images/landing-page.png') }}" alt="">
            <div class="h-1/5 bg-pink-secondary rounded-b-[60px] flex flex-col justify-center">
                <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </a>
    </div>

    <!-- 3 blog kedua  -->
    <div class="grid md:grid-cols-3 grid-cols-1 gap-9">
        <div class="xl:h-[400px] lg:h-[350px] rounded-xl bg-pink-secondary">
            <img class="w-full h-4/5 rounded-t-xl object-cover" src="{{ asset('images/landing-page.png') }}" alt="">
            <div class="h-1/5 bg-pink-secondary rounded-b-xl flex flex-col justify-center">
                <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>        
        <div class="xl:h-[400px] lg:h-[350px] rounded-xl bg-pink-secondary">
            <img class="w-full h-4/5 rounded-t-xl object-cover" src="{{ asset('images/landing-page.png') }}" alt="">
            <div class="h-1/5 bg-pink-secondary rounded-b-xl flex flex-col justify-center">
                <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>        
        <div class="xl:h-[400px] lg:h-[350px] rounded-xl bg-pink-secondary">
            <img class="w-full h-4/5 rounded-t-xl object-cover" src="{{ asset('images/landing-page.png') }}" alt="">
            <div class="h-1/5 bg-pink-secondary rounded-b-xl flex flex-col justify-center">
                <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>
</div>


<!-- Blog lainnya  -->
<div class="my-12 bg-pink-secondary bg-opacity-20">
    <div class="w-4/5 mx-auto ">
        <!-- for each -->
        <div class="w-full py-8 md:flex block">
            <img class="md:w-1/4 h-full rounded-xl object-cover border-2 border-pink-secondary me-8"
                src="{{ asset('images/landing-page.png') }}" alt="">
            <div class="md:text-left flex flex-col justify-center">
                <h5 class="text-pink-primary font-bold text-3xl">Judul Artikel</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum nobis deserunt deleniti sint debitis quo
                    quis doloribus,
                    sed nihil, facilis harum, veniam explicabo sequi? Cumque sit natus voluptate modi iure!</p>
            </div>
        </div>
        <!-- end for each  -->
         
        <!-- contoh tambahan  -->
        <div class="w-full py-8 md:flex block">
            <img class="md:w-1/4 h-full rounded-xl object-cover border-2 border-pink-secondary me-8"
                src="{{ asset('images/landing-page.png') }}" alt="">
            <div class="md:text-left flex flex-col justify-center">
                <h5 class="text-pink-primary font-bold text-3xl">Judul Artikel</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum nobis deserunt deleniti sint debitis quo
                    quis doloribus,
                    sed nihil, facilis harum, veniam explicabo sequi? Cumque sit natus voluptate modi iure!</p>
            </div>
        </div>
    </div>
</div>
@endsection