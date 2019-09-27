<?php

use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'     => 'Ibnu Surkati (Admin)',
                'email'    => str_random(10).'@gmail.com',
                'username' => 'admin',
                'password' => bcrypt('bismillah'),
                'role'     => 'admin',
                'email_verified_at' => now()
            ],
            [
                'name'     => 'Ibnu Surkati (Guru)',
                'email'    => str_random(10).'@gmail.com',
                'username' => 'guru',
                'password' => bcrypt('bismillah'),
                'role'     => 'guru',
                'email_verified_at' => now()
            ],
            [
                'name'     => 'Ibnu Surkati (Siswa)',
                'email'    => str_random(10).'@gmail.com',
                'username' => 'siswa',
                'password' => bcrypt('bismillah'),
                'role'     => 'siswa',
                'email_verified_at' => now()
            ]
        ]);

        /** ========================================== */

        DB::table('user_admins')->insert([
            'user_id' => 1,
            'nama'    => 'Ibnu Surkati (Admin)',
            'kelamin' => 'L',
            'alamat'  => 'Jln. Lingkar Pasar Seblat Desa Tanjung Raya Kec. Sukau Kab. Lampung Barat'
        ]);

        /** ========================================== */

        DB::table('user_gurus')->insert([
            'user_id' => 2,
            'mapel'   => json_encode([1]),
            'nama'    => 'Ibnu Surkati (Guru)',
            'kelamin' => 'L',
            'alamat'  => 'Jln. Lingkar Pasar Seblat Desa Tanjung Raya Kec. Sukau Kab. Lampung Barat'
        ]);

        /** ========================================== */

        DB::table('user_siswas')->insert([
            'user_id'    => 3,
            'jurusan_id' => 1,
            'kelas_id'   => 1,
            'nis'        => 2076,
            'nama'       => 'Ibnu Surkati (Siswa)',
            'kelamin'    => 'L',
            'alamat'     => 'Jln. Lingkar Pasar Seblat Desa Tanjung Raya Kec. Sukau Kab. Lampung Barat'
        ]);
    }
}
