<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Mapel;

class AjaxController extends Controller
{

    public function kelas(Request $request)
    {
        $request->validate([
            'jurusan' => 'required'
        ]);
        
        $kelas = Kelas::select('id', 'nama_kelas AS text')
                        ->where('jurusan_id', $request->jurusan)
                        ->get();
        
        return response()->json($kelas);
    }

    public function mapel(Request $request)
    {
        $request->validate([
            'kelas'   => 'required'
        ]);
        
        $kelas = Kelas::select('jenjang', 'jurusan_id')
                        ->where('id', $request->kelas)
                        ->first();

        if (!is_object($kelas)) return response()->json([
            "status"  => false,
            "message" => "Error!",
            "data"    => null
        ]);
        
        $mapel = Mapel::select('id', 'nama_mapel as text')
                        ->where('jurusan_id', $kelas->jurusan_id)
                        ->where('jenjang', $kelas->jenjang)
                        ->get();

        return response()->json($mapel);
    }

}
