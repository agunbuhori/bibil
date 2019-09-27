<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujians', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('jurusan_id');
            $table->unsignedInteger('kelas_id');
            $table->unsignedInteger('mapel_id');
            $table->boolean('remedial')->default(0);
            $table->string('judul_ujian');
            $table->longText('keterangan')->nullable();
            $table->integer('jmlh_soal')->default(0);
            $table->integer('soal_ganda')->default(0);
            $table->integer('soal_essay')->default(0);
            $table->dateTime('date_start');
            $table->dateTime('date_end')->nullable();
            $table->integer('waktu');
            $table->timestamps();
            $table->foreign('jurusan_id')->references('id')->on('jurusans')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('mapel_id')->references('id')->on('mapels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ujians');
    }
}
