<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Guru extends Model
{
    protected $table = 'guru';

    protected $primaryKey = 'id_guru';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id_guru',
        'nama_guru',
        'nip',
        'mapel',
        'jabatan',
        'foto',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($guru) {
            if (!$guru->id_guru) {
                $guru->id_guru = (string) Str::uuid();
            }
        });
    }
}
