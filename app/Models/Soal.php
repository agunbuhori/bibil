<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soals';

    protected $fillable = [
        'ujian_id',
        'jenis_soal',
        'soal',
        'a',
        'b',
        'c',
        'd',
        'e',
        'kunci'
    ];

    protected $hidden = ["created_at", "updated_at"];

    public function ujian()
    {
        return $this->belongsTo('App\Models\Ujian', 'ujian_id', 'id');
    }

    public function jawaban()
    {
        return $this->hasOne('App\Models\JawabanDetail', 'soal_id', 'id');
    }
}
