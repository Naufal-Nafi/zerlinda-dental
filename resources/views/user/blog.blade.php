@extends('layout.user')
@section('content')
<div class="min-h-screen w-4/5 mx-auto ">
    <div class="flex justify-between md:mt-20 mt-12">
        <h1 class="text-4xl text-pink-primary font-bold">Postingan Terkini</h1>
        <form action="" method="GET" class="relative mb-4 w-1/2">
            <input type="text" name="keyword" placeholder="Search articles..."
                class="border border-black rounded-lg p-2  w-full" value="{{ request('keyword') }}">
            <button type="submit" class="absolute inset-y-0 right-0 pl-2 flex items-center me-4">
                <img src="{{ asset('icons/icon_search.png') }}" alt="Search Icon" class="w-5 h-5">
            </button>
        </form>


    </div>
    <div class="h-[630px] border border-4 rounded-[65px] border-pink-secondary my-12">
        <img class="w-full h-4/5 rounded-t-[60px] object-cover" src="{{ asset('images/landing-page.png') }}" alt="">
        <div class="h-1/5 bg-pink-secondary rounded-b-[60px] flex flex-col justify-center">
            <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-9">
        <div class="h-[400px] rounded-xl bg-pink-secondary">
            <img class="w-full h-4/5 rounded-t-xl object-cover" src="{{ asset('images/landing-page.png') }}" alt="">
            <div class="h-1/5 bg-pink-secondary rounded-b-xl flex flex-col justify-center">
                <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        <div class="h-[400px] rounded-xl bg-pink-secondary">
            <img class="w-full h-4/5 rounded-t-xl object-cover" src="{{ asset('images/landing-page.png') }}" alt="">
            <div class="h-1/5 bg-pink-secondary rounded-b-xl flex flex-col justify-center">
                <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        <div class="h-[400px] rounded-xl bg-pink-secondary">
            <img class="w-full h-4/5 rounded-t-xl object-cover" src="{{ asset('images/landing-page.png') }}" alt="">
            <div class="h-1/5 bg-pink-secondary rounded-b-xl flex flex-col justify-center">
                <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>
    <div class="my-12">
        <div class="w-full h-[300px] flex">
            <img class="w-1/4 h-full rounded-xl object-cover border border-2 border-pink-secondary me-8" src="{{ asset('images/landing-page.png') }}" alt="">
            <div class="text-left flex flex-col justify-center">
                <h5 class="text-pink-primary font-bold text-3xl">Judul Artikel</h5>
                <p >Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum nobis deserunt deleniti sint debitis quo quis doloribus, 
                    sed nihil, facilis harum, veniam explicabo sequi? Cumque sit natus voluptate modi iure!</p>
            </div>
        </div>
    </div>
</div>
@endsection