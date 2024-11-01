@extends('layout.user')
@section('content')
<div class="min-h-screen w-4/5 mx-auto">
    <div class="py-12 bg-pink-secondary md:my-20 my-12 md:rounded-[65px] rounded-xl">
        <div class="w-4/5 mx-auto grid grid-cols-1 gap-6">
            <div class="">
                <h1 class="md:text-4xl text-xl font-bold ">JADWAL</h1>
            </div>
            <div class="text-left ">
                <p class="md:text-xl text-base font-bold">Tanggal</p>
                <form action="" method="GET" class="relative w-full">
                    <input type="date" name="keyword" placeholder="5 September 2024"
                    class="border border-black rounded-lg p-2  w-full" value="{{ request('keyword') }}">                    
                </form>
            </div>
            <div>
                <button class="bg-pink-primary rounded-md text-white w-full p-2 font-bold md:text-xl text-base">Cari</button>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-6 mb-20">
        <div class="p-4 bg-pink-secondary rounded-xl md:flex justify-between block font-bold md:text-xl text-base">
            <div class="grid md:grid-cols-2 grid-cols-1 gap-8">
                <img class="mx-auto rounded-xl" src="{{ asset('images/doctor_photo.png')  }}" alt="">
                <div class="md:text-left my-auto">
                    <p>Dokter</p>
                    <p>Nama Dokter</p>
                </div>
            </div>
            <div class="my-auto gap-max">
                <p>Jam</p>
                <p>15:00 - 21:00 WIB</p>
            </div>
        </div>
        <div class="p-4 bg-pink-secondary rounded-xl md:flex justify-between block font-bold md:text-xl text-base">
            <div class="grid md:grid-cols-2 grid-cols-1 gap-8">
                <img class="mx-auto rounded-xl" src="{{ asset('images/doctor_photo.png')  }}" alt="">
                <div class="md:text-left my-auto">
                    <p>Dokter</p>
                    <p>Nama Dokter</p>
                </div>
            </div>
            <div class="my-auto gap-max">
                <p>Jam</p>
                <p>15:00 - 21:00 WIB</p>
            </div>
        </div>
        <div class="p-4 bg-pink-secondary rounded-xl md:flex justify-between block font-bold md:text-xl text-base">
            <div class="grid md:grid-cols-2 grid-cols-1 gap-8">
                <img class="mx-auto rounded-xl" src="{{ asset('images/doctor_photo.png')  }}" alt="">
                <div class="md:text-left my-auto">
                    <p>Dokter</p>
                    <p>Nama Dokter</p>
                </div>
            </div>
            <div class="my-auto gap-max">
                <p>Jam</p>
                <p>15:00 - 21:00 WIB</p>
            </div>
        </div>
        
    </div>
</div>
@endsection