<?php

use Illuminate\Database\Seeder;

class MenuAdminSeeder extends Seeder
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
                "roles"  => "admin",
                "parent" => null,
                "childs" => 0
            ],
            [
                "routes" => null,
                "name"   => "Data Users",
                "icons"  => "fa fa-cubes",
                "roles"  => "admin",
                "parent" => null,
                "childs" => 1
            ],
            [
                "routes" => 'guru.index',
                "name"   => "Guru",
                "icons"  => "fa fa-circle-o",
                "roles"  => "admin",
                "parent" => 1001,
                "childs" => 0
            ],
            [
                "routes" => 'siswa.index',
                "name"   => "Siswa",
                "icons"  => "fa fa-circle-o",
                "roles"  => "admin",
                "parent" => 1001,
                "childs" => 0
            ],
            [
                "routes" => null,
                "name"   => "Orang Tua",
                "icons"  => "fa fa-circle-o",
                "roles"  => "admin",
                "parent" => 1001,
                "childs" => 0
            ],
            [
                "routes" => 'jurusan.index',
                "name"   => "Jurusan",
                "icons"  => "fa fa-graduation-cap",
                "roles"  => "admin",
                "parent" => null,
                "childs" => 0
            ],
            [
                "routes" => 'kelas.index',
                "name"   => "Kelas",
                "icons"  => "fa fa-home",
                "roles"  => "admin",
                "parent" => null,
                "childs" => 0
            ],
            [
                "routes" => 'mapel.index',
                "name"   => "Mata Pelajaran",
                "icons"  => "fa fa-book",
                "roles"  => "admin",
                "parent" => null,
                "childs" => 0
            ],
            [
                "routes" => 'ujian.index',
                "name"   => "Ujian",
                "icons"  => "fa fa-files-o",
                "roles"  => "admin",
                "parent" => null,
                "childs" => 0
            ],
            [
                "routes" => 'kisi.index',
                "name"   => "Kisi - Kisi",
                "icons"  => "fa fa-file-text",
                "roles"  => "admin",
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
            $data[$key]['id'] = '10' . $id;
        }
        return $data;
    }

}
