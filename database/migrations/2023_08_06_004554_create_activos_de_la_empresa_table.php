<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivosDeLaEmpresaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activos_de_la_empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombre');
            $table->text('modelo');
            $table->text('marca');
            $table->text('diagnostico');
            $table->text('ODS');
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
        Schema::drop('activos_de_la_empresa');
    }
}
