<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galeri_artikel extends Model
{
    use HasFactory;

    protected $table = 'galeri_artikel';

    protected $primaryKey = 'id_galeri';

    protected $fillable = [
        'id_galeri',
        'judul',
        'deskripsi',
        'url_media',
        'id_artikel'
    ];

    public function artikel()
    {
        return $this->belongsTo(artikel::class, 'id_artikel');
    }
}
