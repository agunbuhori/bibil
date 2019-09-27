<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapels';

    protected $fillable = [
        'jurusan_id',
        'jenjang',
        'nama_mapel',
        'keterangan'
    ];
}
