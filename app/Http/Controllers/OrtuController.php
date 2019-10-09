<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Traits\UserTraits;
use App\Models\UserOrtu as Ortu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrtuController extends Controller
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

        $ortu = Ortu::when($request->keyword, function ($query) use ($request) {
            $query->where('nama', 'like', "%{$request->keyword}%");
        })->paginate($request->limit ?? 5);
        
        $ortu->appends($request->only('keyword', 'limit'));

        $view = ($request->ajax()) ? 'list' : 'index';
        
        return view('pages.ortu.' . $view, compact('ortu', 'request'));
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
            'nama'       => 'required',
            'email'      => 'required',
            'username'   => 'required',
            'kelamin'    => 'required',
            'siswa_id'   => 'required'
        ]);

        $user = $this->createUser($request, 'ortu');

        return $this->createOrtu($user->id, $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ortu = Ortu::find($id);

        return view('pages.ortu.detail', compact('ortu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ortu::find($id);

        return response()->json([
            "status"  => true,
            "message" => "Success!",
            "data"    => [
                "nama"       => $data->nama,
                "siswa_id"   => $data->siswa_id,
                "email"      => $data->user->email,
                "username"   => $data->user->username,
                "nama"       => $data->nama,
                "nis"        => $data->nis,
                "kelamin"    => $data->kelamin,
                "alamat"     => $data->alamat
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
            'nama'       => 'required',
            'email'      => 'required',
            'username'   => 'required',
            'nis'        => 'required',
            'kelamin'    => 'required'
        ]);
        
        $ortu = Ortu::find($id);
        $user  = User::find($ortu->user_id);

        $check = $ortu->update([
            'nama'       => $request->nama,
            'nis'        => $request->nis,
            'kelamin'    => $request->kelamin,
            'alamat'     => $request->alamat
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
            'message' => 'Gagal mengubah ortu',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil mengubah ortu',
            'data'    => $ortu
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
