<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galeri_layanan extends Model
{
    use HasFactory;

    protected $table = 'galeri_layanan';

    protected $primaryKey = 'id_galeri';

    protected $fillable = [
        'id_galeri',
        'judul',
        'deskripsi',
        'url_media',
        'id_layanan'
    ];

    public function layanan()
    {
        return $this->belongsTo(layanan::class, 'id_layanan', 'id_layanan');
    }
}
