@extends('layout.user')

@section('title', 'Lokasi Zerlinda Dental Care')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center text-start text-pink-primary">
    <h1 class="md:text-5xl text-3xl font-bold md:my-20 my-12">Lokasi Klinik</h1>
    <div class="w-4/5">
        <p class="md:text-3xl text-xl font-bold mb-9">Kunjungi</p>
        <div class="md:border-4 border-2 border-pink-secondary h-450 rounded-3xl ">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d11182.850707198562!2d110.4820929790275!3d-7.711581817977542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwNDInNDQuMiJTIDExMMKwMjknMDAuNCJF!5e0!3m2!1sid!2sid!4v1734955420708!5m2!1sid!2sid"
                width="100%" height="100%" class="rounded-3xl " style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <p class="text-base mt-4 md:mb-40 mb-20">Pucung, Tamanmartani, Kec. Kalasan, Kabupaten Sleman, Daerah Istimewa
            Yogyakarta</p>
    </div>
</div>
@endsection