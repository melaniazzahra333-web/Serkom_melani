<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Prestasi extends Model
{
    protected $table = 'prestasi';

    protected $primaryKey = 'id_prestasi';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id_prestasi',
        'deskripsi',
        'foto',
        'tahun_ajaran',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($prestasi) {
            if (!$prestasi->id_prestasi) {
                $prestasi->id_prestasi = (string) Str::uuid();
            }
        });
    }
}
