<?php

use Illuminate\Database\Seeder;

class UjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ujians')->insert([
            'jurusan_id'  => 1,
            'kelas_id'    => 1,
            'mapel_id'    => 1,
            'remedial'    => 0,
            'judul_ujian' => 'Ujian Bahasa Indonesia',
            'keterangan'  => 'ujian ujicoba',
            'date_start'  => now(),
            'date_end'    => now()->modify('+1 day'),
            'waktu'       => 120
        ]);
        /* ========================================== */
        DB::table('soals')->insert([
            [
                'ujian_id'   => 1,
                'jenis_soal' => 'ganda',
                'soal'       => '<p>ada apa dengan apa ?</p>',
                'a'          => 'siapa ?',
                'b'          => 'bagaimana ?',
                'c'          => 'dimana ?',
                'd'          => 'mengapa ?',
                'e'          => 'kapan ?',
                'kunci'      => 'a'
            ],
            [
                'ujian_id'   => 1,
                'jenis_soal' => 'ganda',
                'soal'       => '<p>bagaimana dengan siapa ?</p>',
                'a'          => 'siapa ?',
                'b'          => 'bagaimana ?',
                'c'          => 'dimana ?',
                'd'          => 'mengapa ?',
                'e'          => 'kapan ?',
                'kunci'      => 'a'
            ],
            [
                'ujian_id'   => 1,
                'jenis_soal' => 'ganda',
                'soal'       => '<p>kapan kita kemana ?</p>',
                'a'          => 'siapa ?',
                'b'          => 'bagaimana ?',
                'c'          => 'dimana ?',
                'd'          => 'mengapa ?',
                'e'          => 'kapan ?',
                'kunci'      => 'a'
            ],
            [
                'ujian_id'   => 1,
                'jenis_soal' => 'essay',
                'soal'       => '<p>mengapa apa dan bagaimana ?</p>',
                'a'          => null,
                'b'          => null,
                'c'          => null,
                'd'          => null,
                'e'          => null,
                'kunci'      => '<p>yaa Siap</p>'
            ],
            [
                'ujian_id'   => 1,
                'jenis_soal' => 'essay',
                'soal'       => '<p>mengapa apa siapa yang mana ?</p>',
                'a'          => null,
                'b'          => null,
                'c'          => null,
                'd'          => null,
                'e'          => null,
                'kunci'      => '<p>yaa Siap</p>'
            ],
            [
                'ujian_id'   => 1,
                'jenis_soal' => 'essay',
                'soal'       => '<p>njugidek ?</p>',
                'a'          => null,
                'b'          => null,
                'c'          => null,
                'd'          => null,
                'e'          => null,
                'kunci'      => '<p>yaa Siap</p>'
            ]
        ]);
        // ========================== //
        DB::unprepared("CALL `count_soal`(1)");
    }
}
