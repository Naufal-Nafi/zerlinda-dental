<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nette\Schema\Schema as SchemaSchema;

return new class extends Migration
{
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
            $table->json('jadwal')->nullable();
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
        $table->string('reset_token', 255)->nullable();
        $table->timestamp('token_expires_at')->nullable();
        $table->timestamps();
    });
    
    Schema::create('galeri_layanan_anak', function (Blueprint $table) {
        $table->id('id_galeri');
        $table->string('judul', 100);
        $table->string('deskripsi');
        $table->text('url_media');
        $table->timestamps();
        $table->foreignId('id_layanan_ank')->references('id_layanan_ank')->on('layanan_anak');
    });

    Schema::create('galeri_layanan_dewasa', function (Blueprint $table) {
        $table->id('id_galeri');
        $table->string('judul', 100);
        $table->string('deskripsi');
        $table->text('url_media');
        $table->timestamps();
        $table->foreignId('id_layanan_dws')->references('id_layanan_dws')->on('layanan_dewasa')->onDelete('cascade');
    });

    Schema::create('galeri_dokter', function (Blueprint $table) {
        $table->id('id_galeri');
        $table->string('judul', 100);
        $table->string('deskripsi');
        $table->text('url_media');
        $table->timestamps();
        $table->foreignId('id_dokter')->references('id_dokter')->on('dokter')->onDelete('cascade');
    });

    Schema::create('galeri_artikel', function (Blueprint $table) {
        $table->id('id_galeri');
        $table->string('judul', 100);
        $table->string('deskripsi');
        $table->text('url_media');
        $table->timestamps();

        $table->foreignId('id_artikel')->references('id_artikel')->on('artikel')->onDelete('cascade');
    });

    Schema::create('landing_page', function (Blueprint $table) {
        $table->id('id_galeri');
        $table->string('keterangan');
        $table->text('url_media');
        $table->timestamps();
    });

    Schema::create('sessions', function (Blueprint $table) {
        $table->string('id')->primary();
        $table->foreignId('user_id')->nullable()->index();
        $table->string('ip_address', 45)->nullable();
        $table->text('user_agent')->nullable();
        $table->longText('payload');
        $table->integer('last_activity')->index();
    });

    Schema::create('cache', function (Blueprint $table) {
        $table->string('key')->primary();
        $table->mediumtext('value');
        $table->integer('expires_at')->nullable();
    });

}


    
    public function down(): void
    {
        Schema::dropIfExists('artikel');
        Schema::dropIfExists('galeri_layanan_artikel');
        Schema::dropIfExists('galeri_dokter');
        Schema::dropIfExists('galeri_layanan_dewasa');
        Schema::dropIfExists('galeri_layanan_anak');
        Schema::dropIfExists('pengguna');
        Schema::dropIfExists('kontak');
        Schema::dropIfExists('layanan_dewasa');
        Schema::dropIfExists('layanan_anak');
        Schema::dropIfExists('dokter');
        Schema::dropIfExists('landing_page');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('cache');
    }


};
