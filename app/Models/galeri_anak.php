<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galeri_anak extends Model
{
    use HasFactory;

    protected $table = 'galeri_layanan_anak';

    protected $primaryKey = 'id_galeri';

    protected $fillable = [
        'id_galeri',
        'judul',
        'deskripsi',
        'url_media',
        'id_layanan_ank'
    ];

    public function layanan_anak()
    {
        return $this->belongsTo(layanan_anak::class, 'id_layanan_ank');
    }
}
