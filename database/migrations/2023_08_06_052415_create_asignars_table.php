<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignarsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignars', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('Analista');
            $table->longText('Activo');
            $table->longText('Herramienta');
            $table->date('Entrega');
            $table->date('Devuelto');
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
        Schema::drop('asignars');
    }
}
