<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabanDetail extends Model
{
    protected $table = 'jawaban_details';

    protected $fillable = [
        'jawaban_id',
        'soal_id',
        'jenis_soal',
        'ragu',
        'jawaban_ganda',
        'jawaban_essay'
    ];

    protected $hidden = ["created_at", "updated_at"];

    public function soal()
    {
        return $this->hasOne('App\Models\Soal', 'id', 'soal_id');
    }

}
