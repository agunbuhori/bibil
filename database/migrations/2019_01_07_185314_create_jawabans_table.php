<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ujian_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->boolean('remedial')->default(0);
            $table->string('judul_ujian');
            $table->longText('keterangan')->nullable();
            $table->integer('jmlh_soal')->default(0);
            $table->integer('soal_ganda_benar')->default(0);
            $table->integer('soal_essay_benar')->default(0);
            $table->string('status', 11)->default('mengerjakan');
            $table->dateTime('start');
            $table->dateTime('end')->nullable();
            $table->timestamps();
            $table->foreign('ujian_id')->references('id')->on('ujians')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawabans');
    }
}
