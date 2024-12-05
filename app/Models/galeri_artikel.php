<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galeri_artikel extends Model
{
    use HasFactory;

    protected $table = 'galeri_artikel';

    protected $primaryKey = 'id_galeri';

    /**
     * fillable
     *
     * @var array
     */
    
    protected $fillable = [
        'id_galeri',
        'judul',
        'deskripsi',
        'url_media',
        'id_artikel'
    ];

    public function artikel()
    {
        return $this->belongsTo(artikel::class, 'id_artikel', 'id_artikel');
    }

    /**
     * image
     *
     * @return Attribute
     */

    public function images():Attribute
    {
        return Attribute::make(
            fn ($url_media) => asset('storage/images/galeri_artikel' . $url_media),
        );
    }
}
