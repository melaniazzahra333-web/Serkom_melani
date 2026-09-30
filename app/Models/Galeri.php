<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Galeri extends Model
{
    protected $table = 'galeri';

    protected $primaryKey = 'id_galeri';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id_galeri',
        'judul',
        'keterangan',
        'file',
        'kategori',
        'tanggal',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($galeri) {
            if (!$galeri->id_galeri) {
                $galeri->id_galeri = (string) Str::uuid();
            }
        });
    }
}
