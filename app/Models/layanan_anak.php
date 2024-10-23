<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class layanan_anak extends Model
{
    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'gambar',
    ];
}
