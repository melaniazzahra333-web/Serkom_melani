<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';

    protected $primaryKey = 'id_pengumuman';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id_pengumuman',
        'judul',
        'isi',
        'tanggal',
        'status',
        'id_user',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
