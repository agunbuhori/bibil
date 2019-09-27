<?php

use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            [
                'jurusan_id' => 1,
                'jenjang'    => 'X',
                'nama_kelas' => 'X TKJ 1',
                'keterangan' => 'Kelas Unggulan'
            ],
            [
                'jurusan_id' => 1,
                'jenjang'    => 'X',
                'nama_kelas' => 'X TKJ 2',
                'keterangan' => 'Kelas Biasa'
            ],
            [
                'jurusan_id' => 1,
                'jenjang'    => 'XI',
                'nama_kelas' => 'XI TKJ 1',
                'keterangan' => 'Kelas Unggulan'
            ],
            [
                'jurusan_id' => 1,
                'jenjang'    => 'XI',
                'nama_kelas' => 'XI TKJ 2',
                'keterangan' => 'Kelas Biasa'
            ],
            [
                'jurusan_id' => 1,
                'jenjang'    => 'XII',
                'nama_kelas' => 'XII TKJ 1',
                'keterangan' => 'Kelas Unggulan'
            ],
            [
                'jurusan_id' => 1,
                'jenjang'    => 'XII',
                'nama_kelas' => 'XII TKJ 2',
                'keterangan' => 'Kelas Biasa'
            ],
            [
                'jurusan_id' => 2,
                'jenjang'    => 'X',
                'nama_kelas' => 'X RPL 1',
                'keterangan' => 'Kelas Unggulan'
            ],
            [
                'jurusan_id' => 2,
                'jenjang'    => 'X',
                'nama_kelas' => 'X RPL 2',
                'keterangan' => 'Kelas Biasa'
            ],
            [
                'jurusan_id' => 2,
                'jenjang'    => 'XI',
                'nama_kelas' => 'XI RPL 1',
                'keterangan' => 'Kelas Unggulan'
            ],
            [
                'jurusan_id' => 2,
                'jenjang'    => 'XI',
                'nama_kelas' => 'XI RPL 2',
                'keterangan' => 'Kelas Biasa'
            ],
            [
                'jurusan_id' => 2,
                'jenjang'    => 'XII',
                'nama_kelas' => 'XII RPL 1',
                'keterangan' => 'Kelas Unggulan'
            ],
            [
                'jurusan_id' => 2,
                'jenjang'    => 'XII',
                'nama_kelas' => 'XII RPL 2',
                'keterangan' => 'Kelas Biasa'
            ],
            [
                'jurusan_id' => 3,
                'jenjang'    => 'X',
                'nama_kelas' => 'X AK 1',
                'keterangan' => 'Kelas Unggulan'
            ],
            [
                'jurusan_id' => 3,
                'jenjang'    => 'X',
                'nama_kelas' => 'X AK 2',
                'keterangan' => 'Kelas Biasa'
            ],
            [
                'jurusan_id' => 3,
                'jenjang'    => 'XI',
                'nama_kelas' => 'XI AK 1',
                'keterangan' => 'Kelas Unggulan'
            ],
            [
                'jurusan_id' => 3,
                'jenjang'    => 'XI',
                'nama_kelas' => 'XI AK 2',
                'keterangan' => 'Kelas Biasa'
            ],
            [
                'jurusan_id' => 3,
                'jenjang'    => 'XII',
                'nama_kelas' => 'XII AK 1',
                'keterangan' => 'Kelas Unggulan'
            ],
            [
                'jurusan_id' => 3,
                'jenjang'    => 'XII',
                'nama_kelas' => 'XII AK 2',
                'keterangan' => 'Kelas Biasa'
            ],
            [
                'jurusan_id' => 4,
                'jenjang'    => 'X',
                'nama_kelas' => 'X TL 1',
                'keterangan' => 'Kelas Unggulan'
            ],
            [
                'jurusan_id' => 4,
                'jenjang'    => 'X',
                'nama_kelas' => 'X TL 2',
                'keterangan' => 'Kelas Biasa'
            ],
            [
                'jurusan_id' => 4,
                'jenjang'    => 'XI',
                'nama_kelas' => 'XI TL 1',
                'keterangan' => 'Kelas Unggulan'
            ],
            [
                'jurusan_id' => 4,
                'jenjang'    => 'XI',
                'nama_kelas' => 'XI TL 2',
                'keterangan' => 'Kelas Biasa'
            ],
            [
                'jurusan_id' => 4,
                'jenjang'    => 'XII',
                'nama_kelas' => 'XII TL 1',
                'keterangan' => 'Kelas Unggulan'
            ],
            [
                'jurusan_id' => 4,
                'jenjang'    => 'XII',
                'nama_kelas' => 'XII TL 2',
                'keterangan' => 'Kelas Biasa'
            ]
        ]);
    }
}
