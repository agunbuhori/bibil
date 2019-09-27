<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
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

        $kelas = Kelas::when($request->keyword, function ($query) use ($request) {
            $query->where('nama_kelas', 'like', "%{$request->keyword}%")
                ->orWhere('keterangan', 'like', "%{$request->keyword}%");
        })->paginate($request->limit ?? 5);
        
        $kelas->appends($request->only('keyword', 'limit'));

        $view = ($request->ajax()) ? 'list' : 'index';
        
        return view('pages.kelas.' . $view, compact('kelas', 'request'));
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
            'nama_kelas' => 'required',
        ]);

        $kelas = Kelas::create($request->except('_token'));
        
        if (!$kelas) return response()->json([
            'status'  => false,
            'message' => 'Gagal menambah kelas',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil menambah kelas',
            'data'    => $kelas
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
        $kelas = Kelas::find($id);
        return response()->json([
            "status"  => true,
            "message" => "Success!",
            "data"    => $kelas
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
            'nama_kelas' => 'required'
        ]);

        $model = Kelas::find($id);
        $kelas = $model->update($request->except('_token'));
        
        if (!$kelas) return response()->json([
            'status'  => false,
            'message' => 'Gagal mengubah kelas',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil mengubah kelas',
            'data'    => $kelas
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

        $kelas = Kelas::destroy($id);

        if (!$kelas) return response()->json([
            'status'  => false,
            'message' => 'Gagal Menghapus kelas',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil Menghapus kelas',
            'data'    => null
        ]);
    }
}
