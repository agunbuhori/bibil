<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;

class Ujian extends Model
{
    protected $table = 'ujians';

    protected $fillable = [
        'id',
        'jurusan_id',
        'kelas_id',
        'mapel_id', 
        'remedial',
        'judul_ujian',
        'keterangan',
        'date_start',
        'date_end',
        'waktu'
    ];

    public function kisi()
    {
        return $this->belongsTo('App\Models\KisiKisi', 'id', 'ujian_id');
    }

    public function jawaban()
    {
        return $this->hasMany('App\Models\Jawaban', 'id', 'ujian_id');
    }

    public function jawabanSiswa()
    {
        return Jawaban::where('ujian_id', $this->id)
                    ->where('status', '!=', 'mengerjakan')
                    ->where('user_id', Auth::user()->id)
                    ->first();
    }

}
