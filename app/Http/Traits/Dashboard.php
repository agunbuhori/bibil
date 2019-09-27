<?php

namespace App\Http\Traits;

use App\Models\UserSiswa;
use App\Models\UserGuru;
use App\Models\Ujian;

trait Dashboard
{

    protected function widget()
    {
        $siswa = UserSiswa::count();
        $guru  = UserGuru::count();
        $ujian = Ujian::count();
        return (object) [
            'siswa'   => $siswa ?? 0,
            'guru'    => $guru ?? 0,
            'average' => 0,
            'ujian'   => $ujian ?? 0
        ];
    }

    protected function ujianTerakhir()
    {
        return Ujian::limit(5)->get();
    }

}
