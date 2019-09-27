<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'limit'   => 'integer',
            'keyword' => 'string'
        ]);

        $mapel = Mapel::when($request->keyword, function ($query) use ($request) {
            $query->where('nama_mapel', 'like', "%{$request->keyword}%")
                ->orWhere('keterangan', 'like', "%{$request->keyword}%");
        })->paginate($request->limit ?? 5);
        
        $mapel->appends($request->only('keyword', 'limit'));

        $view = ($request->ajax()) ? 'list' : 'index';
        
        return view('pages.mapel.' . $view, compact('mapel', 'request'));
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
            'jurusan_id' => 'integer|required',
            'jenjang'    => 'required',
            'nama_mapel' => 'required',
        ]);

        $mapel = Mapel::create($request->except('_token'));
        
        if (!$mapel) return response()->json([
            'status'  => false,
            'message' => 'Gagal menambah mapel',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil menambah mapel',
            'data'    => $mapel
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
        $mapel = Mapel::find($id);
        return response()->json([
            "status"  => true,
            "message" => "Success!",
            "data"    => $mapel
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
            'jurusan_id' => 'integer|required',
            'jenjang'    => 'required',
            'nama_mapel' => 'required'
        ]);

        $model   = Mapel::find($id);
        $mapel = $model->update($request->except('_token'));
        
        if (!$mapel) return response()->json([
            'status'  => false,
            'message' => 'Gagal mengubah mapel',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil mengubah mapel',
            'data'    => $mapel
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

        $mapel = Mapel::destroy($id);

        if (!$mapel) return response()->json([
            'status'  => false,
            'message' => 'Gagal Menghapus mapel',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil Menghapus mapel',
            'data'    => null
        ]);
    }

    public function mapel(Request $request)
    {
        $idKelas = Auth::user()->siswa->kelas_id;

        $request->validate([
            'limit'   => 'integer',
            'keyword' => 'string'
        ]);
        
        $kelas = Kelas::select('jenjang', 'jurusan_id')
                        ->where('id', $idKelas)
                        ->first();

        if (!is_object($kelas)) return abort(404, 'Not Found !.');

        $mapel = Mapel::when($request->keyword, function ($query) use ($request) {
            $query->where('nama_mapel', 'like', "%{$request->keyword}%")
                ->orWhere('keterangan', 'like', "%{$request->keyword}%");
        })->where('jurusan_id', $kelas->jurusan_id)
          ->where('jenjang', $kelas->jenjang)
          ->paginate($request->limit ?? 5);
        
        $mapel->appends($request->only('keyword', 'limit'));
        
        return view('pages.mapel.mapel', compact('mapel', 'request'));
    }
}
