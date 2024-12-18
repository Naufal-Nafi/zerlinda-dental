<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    protected $primaryKey = 'id_layanan';
    protected $fillable = [
        'id_layanan',
        'nama_layanan',
        'deskripsi',   
        'jenis_layanan'     
    ];

    function galeri_layanan()
    {
        return $this->hasMany(galeri_layanan::class, 'id_layanan', 'id_layanan');
    }
}
