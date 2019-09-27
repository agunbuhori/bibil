<?php

use Illuminate\Database\Seeder;

class MenuSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "routes" => "dashboard",
                "name"   => "Dashboard",
                "icons"  => "fa fa-dashboard",
                "roles"  => "siswa"
            ],
            [
                "routes" => "mapel",
                "name"   => "Mata Pelajaran",
                "icons"  => "fa fa-book",
                "roles"  => "siswa"
            ],
            [
                "routes" => "ujian.online",
                "name"   => "Ujian",
                "icons"  => "fa fa-tv",
                "roles"  => "siswa"
            ],
            [
                "routes" => "jadwal",
                "name"   => "Jadwal Ujian",
                "icons"  => "fa fa-calendar",
                "roles"  => "siswa"
            ],
            [
                "routes" => "nilai.siswa",
                "name"   => "Hasil Ujian",
                "icons"  => "fa fa-files-o",
                "roles"  => "siswa"
            ]
        ];
        DB::table('menus')->insert($this->setId($data));
    }

    private function setId(array $data)
    {
        foreach ($data as $key => $value) {
            $id = ($key < 10) ? '0' . $key : $key;
            $data[$key]['id'] = '40' . $id;
        }
        return $data;
    }

}
