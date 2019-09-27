<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JurusanSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(MapelSeeder::class);
        $this->call(MenuAdminSeeder::class);
        $this->call(DefaultUserSeeder::class);
        $this->call(MenuGuruSeeder::class);
        $this->call(MenuSiswaSeeder::class);
        $this->call(MenuOrtuSeeder::class);
        $this->call(UjianSeeder::class);
    }
}
