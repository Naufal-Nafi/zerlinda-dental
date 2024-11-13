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

    function galeri_dokter()
    {
        return $this->hasMany(galeri_dokter::class, 'id_galeri', 'id_galeri');
    }
        
}
