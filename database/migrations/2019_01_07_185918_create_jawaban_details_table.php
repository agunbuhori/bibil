<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('jawaban_id');
            $table->unsignedInteger('soal_id')->nullable();
            $table->char('jenis_soal', 5);
            $table->boolean('ragu')->default(0);
            $table->char('jawaban_ganda', 1)->nullable();
            $table->longText('jawaban_essay')->nullable();
            $table->boolean('jawaban_essay_benar')->default(0);
            $table->timestamps();
            $table->foreign('jawaban_id')->references('id')->on('jawabans')->onDelete('cascade');
            $table->foreign('soal_id')->references('id')->on('soals')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_details');
    }
}
