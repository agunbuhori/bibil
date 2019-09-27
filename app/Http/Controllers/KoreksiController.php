<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jawaban;
use App\Models\JawabanDetail;

class KoreksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'limit'   => 'integer',
            'keyword' => 'string'
        ]);

        $jawaban = Jawaban::when($request->keyword, function ($query) use ($request) {
            $query->where('judul_ujian', 'like', "%{$request->keyword}%")
                ->orWhere('keterangan', 'like', "%{$request->keyword}%");
        })->where('status', 'dikoreksi')->paginate($request->limit ?? 5);
        
        $jawaban->appends($request->only('keyword', 'limit'));

        $view = ($request->ajax()) ? 'list' : 'index';
        
        return view('pages.koreksi.' . $view, compact('jawaban', 'request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $benar   = 0;
        $jawaban = Jawaban::where('id', $request->id)->first();

        foreach ($request->jawaban as $key => $value) {
            $model = JawabanDetail::find($key);
            $model->update([
                'jawaban_essay_benar' => $value
            ]);
            $benar = $benar + $value;
        }

        $jawaban->update([
            'soal_essay_benar' => $benar,
            'status' => 'selesai'
        ]);

        return redirect()->route('koreksi.index')->with('status', 'Berhasil Update Nilai ' . $jawaban->user->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jawaban = Jawaban::where('id', $id)->first();
        $detail  = JawabanDetail::where('jenis_soal', 'essay')->where('jawaban_id', $id)->get();
        return view('pages.koreksi.koreksi', compact('jawaban', 'detail'));
    }

}