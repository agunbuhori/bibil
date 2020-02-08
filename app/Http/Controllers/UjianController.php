<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ujian;
use App\Models\Soal;
use Auth;

class UjianController extends Controller
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

        $ujian = Ujian::when($request->keyword, function ($query) use ($request) {
            $query->where('judul_ujian', 'like', "%{$request->keyword}%")
                ->orWhere('keterangan', 'like', "%{$request->keyword}%");
        })->whereRaw($this->conditionsMapel())
          ->paginate($request->limit ?? 5);
        
        $ujian->appends($request->only('keyword', 'limit'));

        $view = ($request->ajax()) ? 'list.list' : 'index';
        // dd($ujian);
        return view('pages.ujian.' . $view, compact('ujian', 'request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(!$request->ajax()) return abort(404, 'Page not found!');
        
        $request->validate([
            'jurusan_id'  => 'integer|required',
            'kelas_id'    => 'integer|required',
            'mapel_id'    => 'integer|required',
            'remedial'    => 'required',
            'judul_ujian' => 'required',
            'date_start'  => 'required',
            'date_end'    => 'required',
            'waktu'       => 'integer|required'
        ]);

        $ujian = Ujian::create($request->except('_token'));
        
        if (!$ujian) return response()->json([
            'status'  => false,
            'message' => 'Gagal menambah ujian',
            'data'    => null
        ]);
        // return response()->json([
        //         'status'  => true,
        //         'message' => 'Berhasil menambah ujian',
        //         'data'    => $ujian
        //     ]);
        return redirect('/ujian');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ujian = Ujian::find($id);
        $ganda = Soal::select('id', 'ujian_id', 'soal', 'kunci')
                    ->where('jenis_soal', 'ganda')
                    ->where('ujian_id', $id)
                    ->paginate(5);

        $essay = Soal::select('id', 'ujian_id', 'soal')
                    ->where('jenis_soal', 'essay')
                    ->where('ujian_id', $id)
                    ->paginate(5);

        return view('pages.ujian.detail', compact('ujian', 'ganda', 'essay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ujian = Ujian::find($id);
        return response()->json([
            "status"  => true,
            "message" => "Success!",
            "data"    => $ujian
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
            'jurusan_id'  => 'integer|required',
            'kelas_id'    => 'integer|required',
            'mapel_id'    => 'integer|required',
            'remedial'    => 'required',
            'judul_ujian' => 'required',
            'date_start'  => 'required',
            'date_end'    => 'required',
            'waktu'       => 'integer|required'
        ]);

        $model   = Ujian::find($id);
        $ujian = $model->update($request->except('_token'));
        
        if (!$ujian) return response()->json([
            'status'  => false,
            'message' => 'Gagal mengubah ujian',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil mengubah ujian',
            'data'    => $ujian
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

        $ujian = Ujian::destroy($id);

        if (!$ujian) return response()->json([
            'status'  => false,
            'message' => 'Gagal Menghapus ujian',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil Menghapus ujian',
            'data'    => null
        ]);
    }

    
    public function jadwal(Request $request)
    {
        $idKelas = Auth::user()->siswa->kelas_id;

        $request->validate([
            'limit'   => 'integer',
            'keyword' => 'string'
        ]);

        $ujian = Ujian::when($request->keyword, function ($query) use ($request) {
            $query->where('judul_ujian', 'like', "%{$request->keyword}%")
                ->orWhere('keterangan', 'like', "%{$request->keyword}%");
        })->where('kelas_id', $idKelas)
          ->paginate($request->limit ?? 5);
        
        $ujian->appends($request->only('keyword', 'limit'));
        
        return view('pages.ujian.jadwal', compact('ujian', 'request'));
    }

    private function conditionsMapel()
    {
        // if (Auth::user()->role !== 'guru') {
            return "mapel_id IS NOT NULL";
        // }

        $result = '';
        $mapels = json_decode(Auth::user()->guru->mapel);

        foreach ($mapels as $mapel) {
            $result .= "mapel_id = $mapel OR ";
        }

        return substr($result, 0, -4);
    }

}
