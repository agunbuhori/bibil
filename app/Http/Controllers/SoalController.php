<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Soal;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->ajax()) return abort(404, 'Page not found!');
        
        $request->validate([
            'limit'   => 'integer'
        ]);

        $soal = Soal::when($request->keyword, function ($query) use ($request) {
            $query->where('soal', 'like', "%{$request->keyword}%")
                ->where('jawaban_a', 'like', "%{$request->keyword}%")
                ->where('jawaban_b', 'like', "%{$request->keyword}%")
                ->where('jawaban_c', 'like', "%{$request->keyword}%")
                ->where('jawaban_d', 'like', "%{$request->keyword}%")
                ->where('jawaban_e', 'like', "%{$request->keyword}%");
        })->where('jenis_soal', $request->jenis)
          ->where('ujian_id', $request->ujian_id)
          ->paginate($request->limit ?? 5);
        
        $soal->appends($request->only('keyword', 'limit'));
        
        $jenis = ($request->jenis) ? $request->jenis : 'ganda' ;

        return view('pages.ujian.list.list_soal', compact('soal', 'request', 'jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->ajax()) return abort(404, 'Page not found!');
        
        $request->validate([
            'ujian_id'   => 'integer|required',
            'jenis_soal' => 'required',
            'soal'       => 'required',
            'kunci'      => 'required',
        ]);

        $soal = Soal::create($request->except('_token'));
        
        if (!$soal) return response()->json([
            'status'  => false,
            'message' => 'Gagal menambah soal',
            'data'    => null
        ]);

        DB::unprepared("CALL `count_soal`($soal->ujian_id)");

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil menambah soal',
            'jenis'   => $soal->jenis_soal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $soal = Soal::find($id);
        return response()->json([
            "status"  => true,
            "message" => "Success!",
            "data"    => $soal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$request->ajax()) return abort(404, 'Page not found!');
        
        $request->validate([
            'ujian_id'   => 'integer|required',
            'jenis_soal' => 'required',
            'soal'       => 'required',
            'kunci'      => 'required',
        ]);

        $model = Soal::find($id);
        $soal  = $model->update($request->except('_token'));
        
        if (!$soal) return response()->json([
            'status'  => false,
            'message' => 'Gagal mengubah soal',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil mengubah soal',
            'jenis'   => $model->jenis_soal
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(!$request->ajax()) return abort(404, 'Page not found!');

        $soal = Soal::destroy($id);

        if (!$soal) return response()->json([
            'status'  => false,
            'message' => 'Gagal Menghapus soal',
            'data'    => null
        ]);

        DB::unprepared("CALL `count_soal`($request->ujian)");

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil Menghapus soal',
            'data'    => null
        ]);
    }
}
