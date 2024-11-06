<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';

    protected $primaryKey = 'id_dokter';

    protected $fillable = [
        'id_galeri',
        'nama',
        'jadwal',
        'jadwal_awal',
        'jadwal_akhir',
    ];

    public function galeri()
    {
        return $this->belongsTo(Galeri::class, 'id_galeri');
    }
}
