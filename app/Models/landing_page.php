<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class landing_page extends Model
{
    use HasFactory;

    protected $table = 'landing_page';
    protected $primaryKey = 'id_galeri';
    protected $fillable = [
        
        'keterangan',
        'url_media'
    ];
}
