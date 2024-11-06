<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galeri_dokter extends Model
{
    use HasFactory;

    protected $table = 'galeri_dokter';

    protected $primaryKey = 'id_galeri';

    protected $fillable = [
        'id_galeri',
        'judul',
        'deskripsi',
        'url_media',
        'id_dokter'
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }
}
