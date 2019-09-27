<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ujian;
use App\Models\Soal;
use App\Models\Jawaban;
use App\Models\JawabanDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OnlineController extends Controller
{
    
    public function index()
    {
        $idKelas = Auth::user()->siswa->kelas_id;
        $ujian   = Ujian::where('kelas_id', $idKelas)
                    ->whereRaw("'" . now() . "' BETWEEN date_start AND date_end")
                    ->get();

        return view('pages.ujian.online', compact('ujian'));
    }

    public function play($idUjian)
    {
        $idUser  = Auth::user()->id;
        $ujian   = Ujian::where('id', $idUjian)->first();
        $jawaban = Jawaban::where('ujian_id', $idUjian)
                            ->where('user_id', $idUser)
                            ->first();
        
        if (!is_object($jawaban)) {
            $jawaban = Jawaban::create([
                "ujian_id"    => $idUjian,
                "user_id"     => $idUser,
                "judul_ujian" => $ujian->judul_ujian,
                "keterangan"  => $ujian->keterangan,
                "jmlh_soal"   => $ujian->jmlh_soal,
                "start"       => now(),
                "end"         => now()->modify('+2 hours')
            ]);
        }

        $ganda = Soal::select('id', 'ujian_id', 'soal', 'a', 'b', 'c', 'd', 'e')
                    ->where('jenis_soal', 'ganda')
                    ->where('ujian_id', $idUjian)
                    ->get();

        $essay = Soal::select('id', 'ujian_id', 'soal')
                    ->where('jenis_soal', 'essay')
                    ->where('ujian_id', $idUjian)
                    ->get();

        return view('pages.ujian.online.play', compact('ujian', 'ganda', 'essay', 'jawaban'));
    }

    public function store($id, Request $request)
    {
        if(!$request->ajax()) return abort(404, 'Page not found!');

        $request->validate([
            'jawaban_id' => 'integer|required',
            'soal_id'    => 'integer|required',
            'jenis_soal' => 'required'
        ]);

        $jawaban = JawabanDetail::where('soal_id', $id)
                                ->first();
        
        if (!is_object($jawaban)) {
            $jawaban = JawabanDetail::create($request->except('_token'));
        } else {
            $jawaban->update($request->except('_token'));
        }
        
        if (!$jawaban) return response()->json([
            'status'  => false,
            'message' => 'Gagal menambah jawaban',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil menambah jawaban',
            'data'    => $jawaban
        ]);
    }

    public function selesai($id, Request $request)
    {
        if(!$request->ajax()) return abort(404, 'Page not found!');

        $jawaban    = Jawaban::find($id);
        $totalBenar = DB::table('jawaban_details')
            ->leftJoin('soals', 'jawaban_details.soal_id', '=', 'soals.id')
            ->where('jawaban_details.jenis_soal', 'ganda')
            ->whereRaw('jawaban_details.jawaban_ganda = soals.kunci')
            ->count();
        
        $jawaban->soal_ganda_benar = $totalBenar;
        $jawaban->status           = 'dikoreksi';
        $jawaban->end              = now();
        
        $jawaban->update();
        
        if (!$jawaban) return response()->json([
            'status'  => false,
            'message' => 'Jawaban Gagal Di Simpan, Silahkan Coba lagi',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Jawaban Berhasil Di Simpan',
            'data'    => $jawaban
        ]);
    }

}
