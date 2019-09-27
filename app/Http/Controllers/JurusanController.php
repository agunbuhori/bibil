<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
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

        $jurusan = Jurusan::when($request->keyword, function ($query) use ($request) {
            $query->where('nama_jurusan', 'like', "%{$request->keyword}%")
                ->orWhere('keterangan', 'like', "%{$request->keyword}%");
        })->paginate($request->limit ?? 5);
        
        $jurusan->appends($request->only('keyword', 'limit'));

        $view = ($request->ajax()) ? 'list' : 'index';
        
        return view('pages.jurusan.' . $view, compact('jurusan', 'request'));
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
            'nama_jurusan' => 'required'
        ]);

        $jurusan = Jurusan::create($request->except('_token'));
        
        if (!$jurusan) return response()->json([
            'status'  => false,
            'message' => 'Gagal menambah jurusan',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil menambah jurusan',
            'data'    => $jurusan
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
        $jurusan = Jurusan::find($id);
        return response()->json([
            "status"  => true,
            "message" => "Success!",
            "data"    => $jurusan
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
            'nama_jurusan' => 'required'
        ]);

        $model   = Jurusan::find($id);
        $jurusan = $model->update($request->except('_token'));
        
        if (!$jurusan) return response()->json([
            'status'  => false,
            'message' => 'Gagal mengubah jurusan',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil mengubah jurusan',
            'data'    => $jurusan
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

        $jurusan = Jurusan::destroy($id);

        if (!$jurusan) return response()->json([
            'status'  => false,
            'message' => 'Gagal Menghapus jurusan',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil Menghapus jurusan',
            'data'    => null
        ]);
    }
    
}
