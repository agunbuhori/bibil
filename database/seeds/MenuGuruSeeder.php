<?php

use Illuminate\Database\Seeder;

class MenuGuruSeeder extends Seeder
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
                "routes" => 'dashboard',
                "name"   => "Dashboard",
                "icons"  => "fa fa-dashboard",
                "roles"  => "guru",
                "parent" => null,
                "childs" => 0
            ],
            [
                "routes" => 'mapel.index',
                "name"   => "Mapel",
                "icons"  => "fa fa-book",
                "roles"  => "guru",
                "parent" => null,
                "childs" => 0
            ],
            [
                "routes" => 'ujian.index',
                "name"   => "Ujian",
                "icons"  => "fa fa-files-o",
                "roles"  => "guru",
                "parent" => null,
                "childs" => 0
            ],
            [
                "routes" => 'kisi.index',
                "name"   => "Kisi - Kisi",
                "icons"  => "fa fa-file-text",
                "roles"  => "guru",
                "parent" => null,
                "childs" => 0
            ],
            [
                "routes" => 'koreksi.index',
                "name"   => "Koreksi Ujian",
                "icons"  => "fa fa-edit",
                "roles"  => "guru",
                "parent" => null,
                "childs" => 0
            ],
            [
                "routes" => 'nilai.guru',
                "name"   => "Nilai Siswa",
                "icons"  => "fa fa-file-text-o",
                "roles"  => "guru",
                "parent" => null,
                "childs" => 0
            ]
        ];
        DB::table('menus')->insert($this->setId($data));
    }

    private function setId(array $data)
    {
        foreach ($data as $key => $value) {
            $id = ($key < 10) ? '0' . $key : $key;
            $data[$key]['id'] = '20' . $id;
        }
        return $data;
    }
}
