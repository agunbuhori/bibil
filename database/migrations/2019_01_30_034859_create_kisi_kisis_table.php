<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKisiKisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kisi_kisis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ujian_id')->nullable();
            $table->string('judul');
            $table->string('file');
            $table->timestamps();
            $table->foreign('ujian_id')->references('id')->on('ujians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kisi_kisis');
    }
}
