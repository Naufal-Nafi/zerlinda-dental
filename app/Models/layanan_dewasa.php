<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class layanan_dewasa extends Model
{
    use HasFactory;
    protected $table = 'layanan_dewasa';
    protected $primaryKey = 'id_layanan_dws';
    protected $fillable = [
        'id_galeri',
        'nama_layanan',
        'deskripsi'
    ];

    
}
