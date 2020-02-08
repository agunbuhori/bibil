<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;

class Tagdata extends BaseUtils
{
    
    public static function jurusan()
    {
        $jurusan = DB::table('jurusans')->get();
        // dd($jurusan);
        return parent::tagSelectDB($jurusan, 'id', 'nama_jurusan');
    }
    
    public static function kelas()
    {
        $kelas = DB::table('kelas')->get();
        return parent::tagSelectDB($kelas, 'id', 'nama_kelas');
    }

    public static function mapel()
    {
        $mapel = DB::table('mapels')
                    ->leftJoin('jurusans', 'mapels.jurusan_id', '=', 'jurusans.id')
                    ->select('mapels.id', DB::raw('CONCAT_WS(" - ", jurusans.singkatan, mapels.jenjang, mapels.nama_mapel) AS nama'))
                    ->get();
        return parent::tagSelectDB($mapel, 'id', 'nama');
    }

    public static function ujian()
    {
        $ujian = DB::table('ujians')->get();
        return parent::tagSelectDB($ujian, 'id', 'judul_ujian');
    }

}
