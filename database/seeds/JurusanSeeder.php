<?php

use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusans')->insert([
            [
                'nama_jurusan' => 'Teknik Komputer dan Jaringan',
                'singkatan'    => 'TKJ',
                'keterangan'   => 'Jurusan yang mempelajari tentang jaringan komputer'
            ],
            [
                'nama_jurusan' => 'Rekayasa Perangkat Lunak',
                'singkatan'    => 'RPL',
                'keterangan'   => 'Jurusan yang mempelajari tentang perangkat lunak komputer'
            ],
            [
                'nama_jurusan' => 'Akuntansi',
                'singkatan'    => 'AK',
                'keterangan'   => 'Jurusan yang mempelajari tentang keuangan perusahaan'
            ],
            [
                'nama_jurusan' => 'Teknik Listrik',
                'singkatan'    => 'TL',
                'keterangan'   => 'Jurusan yang mempelajari tentang kelistrikan'
            ]
        ]);
    }
}
