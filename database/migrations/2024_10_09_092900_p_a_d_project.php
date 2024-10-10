<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nette\Schema\Schema as SchemaSchema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('galeri', function (Blueprint $table) {
        $table->increments('id_galeri');
        $table->string('judul', 100);
        $table->text('deskripsi');
        $table->string('url_media', 100);
        $table->date('tanggal_upload');
        $table->timestamps();
    });

    Schema::create('artikel', function (Blueprint $table) {
        $table->increments('id_artikel'); // Primary key
        $table->unsignedInteger('id_galeri'); 
        $table->string('judul', 255);
        $table->text('konten')->nullable();
        $table->date('tanggal_publikasi');
        $table->timestamps();

        $table->foreign('id_galeri')->references('id_galeri')->on('galeri')->onDelete('cascade');
    });

    Schema::create('dokter', function (Blueprint $table) {
        $table->increments('id_dokter'); // Primary key
        $table->unsignedInteger('id_galeri'); 
        $table->string('nama', 100);
        $table->enum('jadwal', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
        $table->time('jadwal_awal');
        $table->time('jadwal_akhir');
        $table->timestamps();

        $table->foreign('id_galeri')->references('id_galeri')->on('galeri')->onDelete('cascade');
    });

    Schema::create('layanan_anak', function (Blueprint $table) {
        $table->increments('id_layanan_ank'); // Primary key
        $table->unsignedInteger('id_galeri');
        $table->string('nama_layanan', 100);
        $table->text('deskripsi');
        $table->timestamps();
        $table->foreign('id_galeri')->references('id_galeri')->on('galeri')->onDelete('cascade');
    });

    Schema::create('layanan_dewasa', function (Blueprint $table) {
        $table->increments('id_layanan_dws'); // Primary key
        $table->unsignedInteger('id_galeri');
        $table->string('nama_layanan', 100);
        $table->text('deskripsi');
        $table->timestamps();
        $table->foreign('id_galeri')->references('id_galeri')->on('galeri')->onDelete('cascade');
    });

    Schema::create('kontak', function (Blueprint $table) {
        $table->id('id_kontak');
        $table->string('jenis_kontak', 255);
        $table->string('nama_akun', 255);
        $table->string('url', 255);
        $table->timestamps();
    });

    Schema::create('pengguna', function (Blueprint $table) {
        $table->id('id_pengguna');
        $table->string('email', 100);
        $table->string('password', 255);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
