@extends('layout.user')
@section('content')
<div class="min-h-screen mx-auto text-pink-primary md:w-4/5 w-[85%]">
    <p class="text-start mt-8 md:text-base text-xs">
        <span onclick="window.location.href='{{ route('home') }}'" class="hover:font-bold cursor-pointer">home</span> /
        <span onclick="window.location.href='{{ route('blog') }}'" class="hover:font-bold cursor-pointer">blog</span> /
        <span>{{ $artikel->judul }}</span>
    </p>

    <h1 class="lg:text-5xl text-2xl font-bold lg:my-20 my-12">{{ $artikel->judul }}</h1>
    @foreach ($artikel->galeri_artikel as $galeri)
    <img src="{{ asset('storage/' . $galeri->url_media) }}" alt="" class="border-4 border-pink-secondary rounded-lg mx-auto">
    @endforeach
    <p class="my-12 text-black text-justify text-xs md:text-base">
        {!! Str::of($artikel->konten)->replace("\n", '<br>') !!}
    </p>
</div>
@endsection