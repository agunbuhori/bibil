<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('routes', 100)->nullable();
            $table->string('params', 100)->nullable();
            $table->string('name', 24);
            $table->string('icons', 24);
            $table->integer('parent')->nullable();
            $table->boolean('childs')->default(0);
            $table->tinyInteger('nourut')->default(0);
            $table->char('roles', 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
