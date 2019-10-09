<?php

namespace App\Http\Traits;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Models\UserOrtu as Ortu;
use App\Models\UserGuru as Guru;
use App\Models\UserSiswa as Siswa;

trait UserTraits
{
    
    protected function createUser($data, $role)
    {
        $user = User::create([
            "name"     => $data->nama,
            "email"    => $data->email,
            "username" => $data->username,
            "password" => Hash::make($data->password),
            "role"     => $role
        ]);

        if (!$user) return response()->json([
            'status'  => false,
            'message' => 'Gagal menambah user',
            'data'    => null
        ]);

        return $user;
    }
    
    protected function createGuru($id, $data)
    {
        $guru = Guru::create([
            "user_id"  => $id,
            "mapel"    => json_encode($data->mapel),
            "nama"     => $data->nama,
            "kelamin"  => $data->kelamin,
            "alamat"   => $data->alamat
        ]);

        if (!$guru) return response()->json([
            'status'  => false,
            'message' => 'Gagal menambah guru',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil menambah guru',
            'data'    => $guru
        ]);
    }
    
    protected function createSiswa($id, $data)
    {
        $siswa = Siswa::create([
            "user_id"    => $id,
            'jurusan_id' => $data->jurusan_id,
            'kelas_id'   => $data->kelas_id,
            'nama'       => $data->nama,
            'nis'        => $data->nis,
            'nisn'       => $data->nisn,
            'kelamin'    => $data->kelamin,
            'alamat'     => $data->alamat,
        ]);

        if (!$siswa) return response()->json([
            'status'  => false,
            'message' => 'Gagal menambah siswa',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil menambah siswa',
            'data'    => $siswa
        ]);
    }

    public function resetPassword($data)
    {
        # code...
    }

    protected function createOrtu($id, $data)
    {
        $ortu = Ortu::create([
            'user_id'    => $id,
            'siswa_id'   => $data->siswa_id,
            'nama'       => $data->nama,
            'nis'        => $data->nis,
            'kelamin'    => $data->kelamin,
            'alamat'     => $data->alamat,
        ]);

        if (!$ortu) return response()->json([
            'status'  => false,
            'message' => 'Gagal menambah ortu',
            'data'    => null
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Berhasil menambah ortu',
            'data'    => $ortu
        ]);
    }

}
