@extends('layout.user')

@section('title', 'Lokasi')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center text-start text-pink-primary">
    <h1 class="text-5xl font-bold my-32">Lokasi Klinik</h1>
    <div class="w-4/5">
        <p class="text-4xl font-bold mb-9">Kunjungi</p>
        <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d988.2841977868217!2d110.37371845166166!3d-7.775316615317261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59d1b10eefdd%3A0xe65afca3cae0ac31!2sDepartemen%20Teknik%20Elektro%20Dan%20Informatika%20UGM!5e0!3m2!1sid!2sid!4v1729410568584!5m2!1sid!2sid" 
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <p class="text-3xl mt-4 mb-40">Jalan Kalasan</p>
    </div>
</div>
@endsection