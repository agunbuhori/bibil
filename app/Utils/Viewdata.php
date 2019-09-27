<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;

class Viewdata extends BaseUtils
{
    
    public static function jurusan($id, $bg = 'blue', $text = false)
    {
        $jurusan = DB::table('jurusans')
                    ->select('singkatan as jurusan', 'nama_jurusan as nama')
                    ->where('id', $id)
                    ->first();
        
        if ($text) {
            return $jurusan ? $jurusan->nama : '';
        } else {
            return $jurusan ? '<span class="label bg-' . $bg . '">' . $jurusan->jurusan . '</span>' : '';
        }
    }
    
    public static function kelas($id, $bg = 'green', $text = false)
    {
        $kelas = DB::table('kelas')
                    ->select('nama_kelas as kelas')
                    ->where('id', $id)
                    ->first();
        if ($text) {
            return $kelas ? $kelas->kelas : '';
        } else {
            return $kelas ? '<span class="label bg-' . $bg . '">' . $kelas->kelas . '</span>' : '';
        }
    }

    public static function mapel($mapel, $bg = 'blue', $text = false)
    {
        $param = json_decode($mapel);
        $conds = "`m`.`id` = '" . implode("' OR `m`.`id` = '", $param) . "'";

        $mapel = DB::select("SELECT CONCAT_WS(' - ', `j`.`singkatan`, `m`.`jenjang`, `m`.`nama_mapel`) AS `mapel` FROM `mapels` `m` LEFT JOIN `jurusans` `j` ON `m`.`jurusan_id` = `j`.`id` WHERE $conds");
        
        if ($text) {
            $result = '';
            foreach ($mapel as $value) {
                $result .= $value->mapel . ', ';
            }
            return substr($result, 0, -2);
        } else {
            return parent::tabSpan($mapel, 'mapel', $bg);
        }
    }

}
