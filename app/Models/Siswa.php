<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $primaryKey = 'id_siswa';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id_siswa',
        'nisn',
        'nama_siswa',
        'jenis_kelamin',
        'tahun_masuk',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($siswa) {
            if (!$siswa->id_siswa) {
                $siswa->id_siswa = (string) Str::uuid();
            }
        });
    }
}
