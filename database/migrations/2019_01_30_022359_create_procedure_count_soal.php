<?php

use Illuminate\Database\Migrations\Migration;

class CreateProcedureCountSoal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::unprepared("CREATE PROCEDURE `count_soal`(IN `ujian_id` INT(11)) NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER BEGIN DECLARE jumlah_soal INTEGER; DECLARE ganda_soal INTEGER; DECLARE essay_soal INTEGER; SET @jumlah_soal = (SELECT COUNT(*) FROM `soals` WHERE `ujian_id` = ujian_id); SET @ganda_soal = (SELECT COUNT(*) FROM `soals` WHERE `ujian_id` = ujian_id AND `jenis_soal` = 'ganda'); SET @essay_soal = (SELECT COUNT(*) FROM `soals` WHERE `ujian_id` = ujian_id AND `jenis_soal` = 'essay'); UPDATE `ujians` SET `jmlh_soal` = @jumlah_soal, `soal_ganda` = @ganda_soal, `soal_essay` = @essay_soal WHERE `id` = ujian_id; END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS `COUNT_SOAL`");
    }
}
