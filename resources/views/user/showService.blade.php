@extends('layout.user')

@section('title', 'p')

@section('content')
<div class="my-12 mx-auto text-pink-primary md:w-4/5 w-[85%]">
    <h1 class="lg:text-5xl text-2xl font-bold lg:my-20 my-12">Judul Pelayanan</h1>
    <img src="{{ asset('images/pelayanan_1.png') }}" alt="" class="border-2 border-pink-secondary rounded-lg mx-auto">
    <p class="mt-12 text-black text-justify">
        Behel berbahan ceramic atau sapphire dapat menjadi alternatif perawatan behel yang lebih estetik. Transparan,
        warna menyatu dengan gigi, serta hampir tidak terlihat, behel estetik ini tersedia dengan sistem konvensional
        ataupun sistem Damon.
    </p>
    <h1 class="lg:text-5xl text-xl font-bold lg:my-20 my-12">Contoh Foto Perawatan</h1>


</div>
<div class="slider my-12">
    <ul class="list py-4" style="        
        --time: 27s;
        --quantity: 9
    ">
        <li class="" style="--index: 1"><img class="rounded-3xl" src="{{ asset('images/pelayanan_2.png') }}" alt="">
        </li>
        <li class="" style="--index: 2"><img class="rounded-3xl" src="{{ asset('images/landing-page.png') }}" alt="">
        </li>
        <li class="" style="--index: 3"><img class="rounded-3xl" src="{{ asset('images/pelayanan_4.png') }}" alt="">
        </li>
        <li class="" style="--index: 4"><img class="rounded-3xl" src="{{ asset('images/landing-page.png') }}" alt="">
        </li>
        <li class="" style="--index: 5"><img class="rounded-3xl" src="{{ asset('images/artikel_3.png') }}" alt="">
        </li>
        <li class="" style="--index: 6"><img class="rounded-3xl" src="{{ asset('images/landing-page.png') }}" alt="">
        </li>
        <li class="" style="--index: 7"><img class="rounded-3xl" src="{{ asset('images/pelayanan_2.png') }}" alt="">
        </li>
        <li class="" style="--index: 8"><img class="rounded-3xl" src="{{ asset('images/landing-page.png') }}" alt="">
        </li>
        <li class="" style="--index: 9"><img class="rounded-3xl" src="{{ asset('images/artikel_4.png') }}" alt="">
        </li>
        

    </ul>
</div>

@endsection