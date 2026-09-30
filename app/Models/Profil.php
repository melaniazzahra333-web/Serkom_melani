<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profil extends Model
{
    protected $table = 'profil';

    protected $primaryKey = 'id_profil';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id_profil',
        'nama_sekolah',
        'kepala_sekolah',
        'npsn',
        'alamat',
        'kontak',
        'visi_misi',
        'tahun_berdiri',
        'deskripsi',
        'foto',
        'logo',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($profil) {
            if (!$profil->id_profil) {
                $profil->id_profil = (string) Str::uuid();
            }
        });
    }
}
