<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawabans';

    protected $fillable = [
        'id',
        'ujian_id',
        'user_id',
        'judul_ujian',
        'keterangan',
        'jmlh_soal',
        'soal_ganda_benar',
        'soal_essay_benar',
        'status',
        'start',
        'end'
    ];

    protected $hidden = ["created_at", "updated_at"];

    public function ujian()
    {
        return $this->hasOne('App\Models\Ujian', 'id', 'ujian_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function countPeserta()
    {
        return $this->where('ujian_id', $this->ujian_id)->count();
    }
}
