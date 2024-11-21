@extends('layout.user')
@section('content')
<div class="min-h-screen mx-auto text-pink-primary md:w-4/5 w-[85%]">
    <p class="text-start mt-8 md:text-base text-xs">
        <span onclick="window.location.href='{{ route('home') }}'" class="hover:font-bold cursor-pointer">home</span> /
        <span onclick="window.location.href='{{ route('blog') }}'" class="hover:font-bold cursor-pointer">blog</span> /
        <span>Judul Artikel</span>
    </p>

    <h1 class="lg:text-5xl text-2xl font-bold lg:my-20 my-12">10 Cara Menghilangkan Karang Gigi, Efektif dan Mudah!</h1>
    <img src="{{ asset('images/artikel_isi.png') }}" alt="" class="border-4 border-pink-secondary rounded-lg mx-auto">
    <p class="my-12 text-black text-justify text-xs md:text-base">
        Karang gigi terbentuk dari plak yang mengeras akibat sisa makanan dan bakteri yang tidak dibersihkan. Jika
        dibiarkan, karang gigi dapat menyebabkan masalah kesehatan seperti radang gusi dan bau mulut. Berikut 10 cara
        efektif untuk mencegah dan menghilangkan karang gigi:

        Rajin Menggosok Gigi
        Menyikat gigi dua kali sehari dengan pasta gigi berfluoride sangat penting untuk mencegah penumpukan plak dan
        karang.

        Gunakan Mouthwash Antiseptik
        Berkumur dengan mouthwash yang mengandung fluoride membantu membunuh bakteri dan mencegah pembentukan plak.

        Menggunakan Benang Gigi
        Benang gigi efektif untuk membersihkan sela-sela gigi yang tidak bisa dijangkau oleh sikat gigi, sehingga
        membantu mencegah plak menjadi karang.

        Berkumur dengan Air Garam
        Air garam adalah antiseptik alami yang dapat mengurangi bakteri di mulut dan mencegah penumpukan karang.

        Menggunakan Baking Soda
        Baking soda bisa digunakan seminggu sekali untuk mengikis plak dan memutihkan gigi, namun harus digunakan dengan
        hati-hati agar tidak merusak enamel.

        Konsumsi Buah dan Sayuran Renyah
        Buah seperti apel dan sayuran renyah seperti wortel membantu mengikis plak dan merangsang produksi air liur,
        yang secara alami membersihkan gigi.

        Minum Air Putih
        Air putih membantu membersihkan sisa makanan dan bakteri setelah makan, serta menjaga keseimbangan kadar asam di
        mulut.

        Batasi Makanan Manis
        Mengurangi konsumsi makanan dan minuman yang manis dapat mencegah plak dan karang gigi terbentuk lebih cepat.

        Rutin Periksa ke Dokter Gigi
        Pemeriksaan rutin ke dokter gigi setiap enam bulan sekali penting untuk menjaga kebersihan dan kesehatan gigi
        secara keseluruhan.

        Lakukan Scaling Gigi
        Jika karang gigi sudah menumpuk, lakukan scaling di dokter gigi untuk membersihkan karang secara profesional.

        Kesimpulannya, cara yang efektif seperti menggosok gigi, menggunakan benang gigi, berkumur dengan mouthwash atau
        air garam, serta memeriksakan gigi ke dokter secara rutin dapat mencegah dan menghilangkan karang gigi. Hal ini
        penting untuk menjaga kesehatan mulut, khususnya kesehatan gusi dan gigi.
    </p>
</div>
@endsection