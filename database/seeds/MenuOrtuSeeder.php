<?php

use Illuminate\Database\Seeder;

class MenuOrtuSeeder extends Seeder
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
                "routes" => null,
                "name"   => "Dashboard",
                "icons"  => "fa fa-dashboard",
                "roles"  => "ortu"
            ],
            [
                "routes" => null,
                "name"   => "Materi Pelajaran",
                "icons"  => "fa fa-book",
                "roles"  => "ortu"
            ],
            [
                "routes" => null,
                "name"   => "Jadwal Ujian",
                "icons"  => "fa fa-calendar",
                "roles"  => "ortu"
            ],
            [
                "routes" => null,
                "name"   => "Hasil Ujian",
                "icons"  => "fa fa-files-o",
                "roles"  => "ortu"
            ]
        ];
        DB::table('menus')->insert($this->setId($data));
    }

    private function setId(array $data)
    {
        foreach ($data as $key => $value) {
            $id = ($key < 10) ? '0' . $key : $key;
            $data[$key]['id'] = '30' . $id;
        }
        return $data;
    }
}
