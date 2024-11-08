<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galeri_dewasa extends Model
{
    use HasFactory;

    protected $table = 'galeri_layanan_dewasa';

    protected $primaryKey = 'id_galeri';

    protected $fillable = [
        'id_galeri',
        'judul',
        'deskripsi',
        'url_media',
        'id_layanan_dws'
    ];

    public function layanan_dewasa()
    {
        return $this->belongsTo(layanan_dewasa::class, 'id_layanan_dws', 'id_layanan_dws');
    }
}
