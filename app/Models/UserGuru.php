<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGuru extends Model
{
    protected $table = 'user_gurus';

    protected $fillable = [
        'user_id',
        'mapel',
        'nama',
        'kelamin',
        'alamat'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
