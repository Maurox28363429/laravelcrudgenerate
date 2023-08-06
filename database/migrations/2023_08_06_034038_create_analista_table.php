<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalistaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analista', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('nombre');
            $table->longText('apellido');
            $table->mediumText('cedula');
            $table->mediumText('Departamento');
            $table->mediumText('Area de trabajo');
            $table->mediumText('Cargo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('analista');
    }
}
