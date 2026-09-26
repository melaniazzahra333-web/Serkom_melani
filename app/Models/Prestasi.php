<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasis';

    protected $primaryKey = 'id_prestasi';

    protected $fillable = [
        'deskripsi',
        'foto',
        'tahun_ajaran',
    ];
}
