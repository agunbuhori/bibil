<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jawaban;
use Auth;

class NilaiController extends Controller
{
    
    public function guru(Request $request)
    {
        $request->validate([
            'limit'   => 'integer',
            'keyword' => 'string'
        ]);

        $nilai = Jawaban::when($request->keyword, function ($query) use ($request) {
            $query->where('judul_ujian', 'like', "%{$request->keyword}%")
                ->orWhere('keterangan', 'like', "%{$request->keyword}%");
        })->groupBy('ujian_id')
          ->where('status', 'selesai')
          ->paginate($request->limit ?? 5);
        
        $nilai->appends($request->only('keyword', 'limit'));
        
        return view('pages.nilai.guru', compact('nilai', 'request'));
    }
    
    public function gurudetail($id, Request $request)
    {
        $request->validate([
            'limit'   => 'integer',
            'keyword' => 'string'
        ]);

        $nilai = Jawaban::when($request->keyword, function ($query) use ($request) {
            $query->where('judul_ujian', 'like', "%{$request->keyword}%")
                ->orWhere('keterangan', 'like', "%{$request->keyword}%");
        })->where('ujian_id', $id)
          ->where('status', 'selesai')
          ->paginate($request->limit ?? 5);
        
        $nilai->appends($request->only('keyword', 'limit'));
        
        return view('pages.nilai.gurudetail', compact('nilai', 'request'));
    }

    public function siswa(Request $request)
    {
        $request->validate([
            'limit'   => 'integer',
            'keyword' => 'string'
        ]);

        $nilai = Jawaban::when($request->keyword, function ($query) use ($request) {
            $query->where('judul_ujian', 'like', "%{$request->keyword}%")
                ->orWhere('keterangan', 'like', "%{$request->keyword}%");
        })->where('user_id', Auth::user()->id)
          ->where('status', 'selesai')
          ->paginate($request->limit ?? 5);
        
        $nilai->appends($request->only('keyword', 'limit'));
        
        return view('pages.nilai.siswa', compact('nilai', 'request'));
    }

}
