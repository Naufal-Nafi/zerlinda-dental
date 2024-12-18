@extends('layout.user')

@section('title')
{{ $service->nama_layanan }}
@endsection

@section('content')
<div class="my-12 mx-auto text-pink-primary md:w-4/5 w-[85%]">
    <h1 class="lg:text-5xl text-2xl font-bold lg:my-20 my-12">{{ $service->nama_layanan }}</h1>

    @if ($galeri = $service->galeri_layanan->first())
        <img src="{{ asset('storage/public/' . $galeri->url_media) }}" alt=""
            class="border-2 border-pink-secondary rounded-lg mx-auto">
    @endif

    <p class="mt-12 text-black text-justify">
        {!! Str::of($service->deskripsi)->replace("\n", '<br>') !!}
    </p>
    <h1 class="lg:text-5xl text-xl font-bold lg:my-20 my-12">Contoh Foto Perawatan</h1>




</div>
<div class="slider my-12">
    @php
        $quantity = count($images); // Total gambar
        $time = $quantity * 3; // Waktu animasi
    @endphp

    <ul class="list py-4" style="        
        --time: {{ $time }}s;
        --quantity: {{ $quantity }};
    ">
        @foreach ($images as $index => $image)
            <li class="" style="--index: {{ $index + 1 }}">
                <img class="rounded-3xl" src="{{ asset('storage/public/' . $image) }}" alt="Image {{ $index + 1 }}">
            </li>
        @endforeach
    </ul>

</div>

@endsection