<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class layanan_anak extends Model
{
    use HasFactory;

    protected $table = 'layanan_anak';
    protected $primaryKey = 'id_layanan_ank';
    protected $fillable = [
        'id_galeri',
        'nama_layanan',
        'deskripsi'
    ];

    public function galeri()
    {
        return $this->belongsTo(Galeri::class, 'id_galeri');
    }
}
