<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokterr extends Model
{
    use HasFactory;

    protected $table = 'dokterr';
    protected $fillable = ['nama', 'gambar', 'jadwal'];
    protected $casts = [
        'jadwal' => 'array', // Otomatis casting JSON menjadi array PHP
    ];
}
