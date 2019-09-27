<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Traits\UserTraits;
use App\Models\UserGuru as Guru;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    use UserTraits;
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

        $guru = Guru::when($request->keyword, function ($query) use ($request) {
            $query->where('nama', 'like', "%{$request->keyword}%");
        })->paginate($request->limit ?? 5);
        
        $guru->appends($request->only('keyword', 'limit'));

        $view = ($request->ajax()) ? 'list' : 'index';
        
        return view('pages.guru.' . $view, compact('guru', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama'     => 'required',
            'email'    => 'required',
            'username' => 'required',
            'password' => 'required',
            'kelamin'  => 'required',
            'mapel'    => 'required|array|min:1'
        ]);

        $user = $this->createUser($request, 'guru');
        
        return $this->createGuru($user->id, $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::find($id);

        $param = json_decode($guru->mapel);
        $conds = "`m`.`id` = '" . implode("' OR `m`.`id` = '", $param) . "'";

        $siswa = DB::select("SELECT `k`.`nama_kelas` AS `kelas`, `m`.`nama_mapel` AS `mapel`, (SELECT COUNT(*) FROM `user_siswas` WHERE `kelas_id` = `k`.`id`) AS `siswa` FROM `mapels` `m` LEFT JOIN `kelas` `k` ON `m`.`jenjang` = `k`.`jenjang` AND `m`.`jurusan_id` = `k`.`jurusan_id` WHERE $conds");

        return view('pages.guru.detail', compact('guru', 'siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::find($id);

        return response()->json([
            "status"  => true,
            "message" => "Success!",
            "data"    => [
                "nama"     => $guru->nama,
                "email"    => $guru->user->email,
                "username" => $guru->user->username,
                "kelamin"  => $guru->kelamin,
                "mapel"    => json_decode($guru->mapel),
                "alamat"   => $guru->alamat
            ]
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
            'nama'     => 'required',
            'email'    => 'required',
            'username' => 'required',
            'kelamin'  => 'required',
            'mapel'    => 'required|array|min:1'
        ]);
        
        $guru = Guru::find($id);
        $user = User::find($guru->user_id);

        $check = $guru->update([
            "nama"    => $request->nama,
            "kelamin" => $request->kelamin,
            "mapel"   => json_encode($request->mapel),
            "alamat"  => $request->alamat
        ]);

        if (!$check) return response()->json([
            'status'  => false,
            'message' => 'Gagal mengubah user',
            'data'    => null
        ]);

        $check = $user->update([
            "name"     => $request->nama,
            "email"    => $request->email,
            "username" => $request->username,
        ]);

        if (!$check) return response()->json([
            'status'  => false,
            'message' => 'Gagal mengubah guru',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil menambah guru',
            'data'    => $guru
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

        $user = User::destroy($id);

        if (!$user) return response()->json([
            'status'  => false,
            'message' => 'Gagal Menghapus user',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil Menghapus user',
            'data'    => null
        ]);
    }

    public function password(Request $request)
    {
        if(!$request->ajax()) return abort(404, 'Page not found!');
        
        $request->validate([
            'new_password'     => 'required',
            'confirm_password' => 'required'
        ]);

        if ($request->new_password !== $request->confirm_password) return abort(404, 'Page not found!');

        $user = User::find($request->id);

        $check = $user->update([
            "password" => Hash::make($request->new_password)
        ]);

        if (!$check) return response()->json([
            'status'  => false,
            'message' => 'Gagal reset password',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil reset password',
            'data'    => $user
        ]);
    }
}
