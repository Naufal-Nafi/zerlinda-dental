@extends('layout.user')
@section('title', 'Jadwal Dokter')
@section('content')
<div class="min-h-screen w-4/5 mx-auto">
    <!-- kotak pencarian jadwal  -->
    <div class="py-12 bg-pink-secondary md:my-20 my-12 md:rounded-[65px] rounded-xl">
        <div class="w-4/5 mx-auto grid grid-cols-1 gap-6">
            <div class="">
                <h1 class="md:text-4xl text-xl font-bold ">JADWAL</h1>
            </div>
            <div class="text-left ">
                <p class="md:text-xl text-base font-bold">Tanggal</p>
                <form action="{{ route('schedule') }}" method="GET" class="relative w-full">
                    <input type="date" name="keyword" placeholder="Masukkan Tanggal"
                        class="border border-black rounded-lg p-2 w-full mb-4" value="{{ request('keyword') }}">
                    <div>
                        <button
                            class="bg-pink-primary hover:bg-pink-800 duration-300 rounded-md text-white w-full p-2 font-bold md:text-xl text-base">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <h2 class="md:text-4xl text-2xl text-pink-primary font-bold mb-4">Jadwal hari {{$hari}}:</h2>

    <!-- list dokter  -->
    <div class="grid grid-cols-1 gap-6 mb-20">
        @foreach ($filteredData as $dokter)      
            <div class="group p-4 bg-pink-secondary rounded-xl md:flex justify-between block font-bold md:text-xl text-base">
                <div class="grid md:grid-cols-2 grid-cols-1 gap-8">
                    <img class="rounded-xl" src="{{ asset('storage/' . $dokter['gambar'])  }}" alt="">
                    <div class="md:text-left my-auto">
                        <p>{{ $dokter['nama'] }}</p>
                    </div>
                </div>
                <div class="my-auto gap-max">
                    @foreach ($dokter['jadwal'] as $hari => $jadwal)        
                        <p>Jam</p>
                        <p>{{$jadwal['jadwal_awal']}} - {{$jadwal['jadwal_akhir']}}</p>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection