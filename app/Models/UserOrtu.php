<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserOrtu extends Model
{
    protected $fillable = [
        'user_id', 'siswa_id', 'nama', 'kelamin', 'nis', 'alamat'
    ];
    public function siswa()
    {
        return $this->belongsTo('App\Models\UserSiswa', 'siswa_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
