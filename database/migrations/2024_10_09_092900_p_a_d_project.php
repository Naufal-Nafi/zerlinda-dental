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
    

    Schema::create('artikel', function (Blueprint $table) {
        $table->id('id_artikel'); // Primary key
        $table->string('judul', 255);
        $table->text('konten')->nullable();
        $table->timestamps();

        
    });

    Schema::create('dokter', function (Blueprint $table) {
        $table->id('id_dokter'); // Primary key
        
        $table->string('nama', 100);
        $table->enum('jadwal', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
        $table->time('jadwal_awal');
        $table->time('jadwal_akhir');
        $table->timestamps();

        
    });

    Schema::create('layanan_anak', function (Blueprint $table) {
        $table->id('id_layanan_ank'); // Primary key
        
        $table->string('nama_layanan', 100);
        $table->text('deskripsi');
        $table->timestamps();
        
    });

    Schema::create('layanan_dewasa', function (Blueprint $table) {
        $table->id('id_layanan_dws'); // Primary key
        
        $table->string('nama_layanan', 100);
        $table->text('deskripsi');
        $table->timestamps();
        
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
        $table->string('username', 255);
        $table->string('password', 255);
        $table->string('level', 255);
        $table->string('token', 255);
        $table->timestamps();
    });
    
    Schema::create('galeri_layanan_anak', function (Blueprint $table) {
        $table->id('id_galeri');
        $table->string('judul', 100);
        $table->text('deskripsi');
        $table->string('url_media', 100);
        $table->timestamps();
        $table->foreignId('id_layanan_ank')->references('id_layanan_ank')->on('layanan_anak');
    });

    Schema::create('galeri_layanan_dewasa', function (Blueprint $table) {
        $table->id('id_galeri');
        $table->string('judul', 100);
        $table->text('deskripsi');
        $table->string('url_media', 100);
        $table->timestamps();

        $table->foreignId('id_layanan_dws')->references('id_layanan_dws')->on('layanan_dewasa')->onDelete('cascade');
    });

    Schema::create('galeri_layanan_dokter', function (Blueprint $table) {
        $table->id('id_galeri');
        $table->string('judul', 100);
        $table->text('deskripsi');
        $table->string('url_media', 100);
        
        $table->timestamps();

        $table->foreignId('id_dokter')->references('id_dokter')->on('dokter')->onDelete('cascade');
    });

    Schema::create('galeri_artikel', function (Blueprint $table) {
        $table->id('id_galeri');
        $table->string('judul', 100);
        $table->text('deskripsi');
        $table->string('url_media', 100);
        
        $table->timestamps();

        $table->foreignId('id_artikel')->references('id_artikel')->on('artikel')->onDelete('cascade');
    });


}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel');
        Schema::dropIfExists('galeri_layanan_artikel');
        
        Schema::dropIfExists('galeri_layanan_dokter');
        Schema::dropIfExists('galeri_layanan_dewasa');
        Schema::dropIfExists('galeri_layanan_anak');
        Schema::dropIfExists('pengguna');
        Schema::dropIfExists('kontak');
        Schema::dropIfExists('layanan_dewasa');
        Schema::dropIfExists('layanan_anak');
        Schema::dropIfExists('dokter');
        
    }
};
