<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KisiKisi extends Model
{
    protected $table = 'kisi_kisis';

    protected $fillable = [
        'ujian_id',
        'judul',
        'file'
    ];
}
