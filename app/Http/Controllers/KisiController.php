<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KisiKisi;

class KisiController extends Controller
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

        $kisi = KisiKisi::when($request->keyword, function ($query) use ($request) {
            $query->where('judul', 'like', "%{$request->keyword}%");
        })->paginate($request->limit ?? 5);
        
        $kisi->appends($request->only('keyword', 'limit'));

        $view = ($request->ajax()) ? 'list' : 'index';
        
        return view('pages.kisi.' . $view, compact('kisi', 'request'));
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
            'judul' => 'required',
            'file'  => 'required|max:5000|mimes:jpg,jpeg,png,gif,doc,docx,pdf,xls,xlsx,zip'
        ]);

        $file = $request->file('file');
        $name = md5(time()) . '.' .$file->getClientOriginalExtension();
        $file->move(public_path('files'), $name);

        $data         = $request->except('_token');
        $data['file'] = $name;

        $kisi = KisiKisi::create($data);
        
        if (!$kisi) return response()->json([
            'status'  => false,
            'message' => 'Gagal menambah kisi',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil menambah kisi',
            'data'    => $kisi
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
        $kisi = KisiKisi::find($id);
        return response()->json([
            "status"  => true,
            "message" => "Success!",
            "data"    => $kisi
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
            'judul' => 'required'
        ]);

        $model   = KisiKisi::find($id);
        $kisi = $model->update($request->except('_token'));
        
        if (!$kisi) return response()->json([
            'status'  => false,
            'message' => 'Gagal mengubah kisi',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil mengubah kisi',
            'data'    => $kisi
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

        $kisi = KisiKisi::destroy($id);

        if (!$kisi) return response()->json([
            'status'  => false,
            'message' => 'Gagal Menghapus kisi',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil Menghapus kisi',
            'data'    => null
        ]);
    }
    
}
