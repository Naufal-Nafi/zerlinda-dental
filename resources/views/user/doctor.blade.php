@extends('layout.user')
@section('title', 'Jadwal Dokter')
@section('content')
<div class="min-h-screen w-full">
    <!-- kotak pencarian jadwal  -->
    <div class="py-12 w-4/5 mx-auto bg-pink-secondary md:my-20 my-12 md:rounded-[65px] rounded-xl">
        <div class="w-4/5 mx-auto grid grid-cols-1 gap-6">
            <div class="">
                <h1 class="text-4xl font-bold ">JADWAL</h1>
            </div>            
        </div>
    </div>

    <div class="w-full flex flex-col lg:flex-row">
        <!-- Div pertama dengan proporsi 30% -->
        <div class="w-full lg:w-[35%] p-4">
            <input type="text" id="flatpickr" placeholder="Pilih tanggal" class="mx-auto ring-2 p-2 rounded-md mb-2">
        </div>
        <!-- Div kedua dengan proporsi 70% -->
        <div class="w-full lg:w-[65%] p-4">
            @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $day)
                        <div id="jadwal-hari-{{$day}}" class="hidden">
                            <h2 class="md:text-4xl text-2xl text-pink-primary font-bold mb-4">Jadwal hari {{$day}}:</h2>
                            @php
                                $dokterHariIni = $dokters->filter(function ($dokter) use ($day) {
                                    return isset($dokter['jadwal'][$day]); // Cek apakah dokter memiliki jadwal di hari ini
                                });
                            @endphp
                            @if ($dokterHariIni->count() > 0)
                                <!-- Loop dokter yang sesuai -->
                                <div class="grid grid-cols-1 mb-8">
                                    @foreach ($dokterHariIni as $dokter)
                                        <div
                                            class="group p-4 bg-pink-secondary rounded-xl flex flex-col md:flex-row justify-between items-center mb-4 font-bold md:text-xl text-base">
                                            <!-- Kolom Kiri: Gambar dan Nama -->
                                            <div class="flex flex-col items-center md:flex-row gap-8">
                                                <img class="rounded-xl size-40 object-cover"
                                                    src="{{ asset('storage/' . $dokter['gambar']) }}" alt="">
                                                <p class="text-center md:text-left">{{ $dokter['nama'] }}</p>
                                            </div>
                                            <!-- Kolom Kanan: Jadwal -->
                                            <div class="text-center">
                                                <p>Jam</p>
                                                <p>{{ $dokter['jadwal'][$day]['jadwal_awal'] }} -
                                                    {{ $dokter['jadwal'][$day]['jadwal_akhir'] }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>Tidak Ada Dokter Yang Tersedia</p>
                            @endif
                        </div>
            @endforeach
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Fungsi untuk menampilkan jadwal berdasarkan hari
            function tampilkanJadwal(hari) {
                const semuaHari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
                semuaHari.forEach(day => {
                    const jadwalDiv = document.getElementById(`jadwal-hari-${day}`);
                    if (jadwalDiv) {
                        if (day === hari) {
                            jadwalDiv.classList.remove('hidden'); // Tampilkan jadwal hari yang sesuai
                        } else {
                            jadwalDiv.classList.add('hidden'); // Sembunyikan jadwal lainnya
                        }
                    }
                });
            }

            // Menampilkan jadwal berdasarkan hari saat ini ketika halaman pertama kali dimuat
            const hariSekarang = new Date().toLocaleDateString('id-ID', { weekday: 'long' }).toLowerCase();
            tampilkanJadwal(hariSekarang);

            // Inisialisasi flatpickr
            flatpickr('#flatpickr', {
                dateFormat: 'Y-m-d',
                inline: true,
                static: true,            
                locale: 'id', // Lokal Bahasa Indonesia
                onChange: function (selectedDates, dateStr, instance) {
                    if (selectedDates.length > 0) {
                        // Ambil nama hari dari tanggal yang dipilih
                        const hari = selectedDates[0].toLocaleDateString('id-ID', { weekday: 'long' }).toLowerCase();
                        tampilkanJadwal(hari);
                    }
                }
            });
        });

    </script>
</div>
@endsection