<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSiswa extends Model
{
    protected $table = 'user_siswas';

    protected $fillable = [
        'user_id',
        'jurusan_id',
        'kelas_id',
        'nama',
        'nis',
        'nisn',
        'kelamin',
        'alamat'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function jurusan()
    {
        return $this->belongsTo('App\Models\Jurusan', 'jurusan_id', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'kelas_id', 'id');
    }

    public function ortu()
    {
        return $this->hasOne('App\Models\UserOrtu', 'siswa_id', 'id');
    }

    
}
