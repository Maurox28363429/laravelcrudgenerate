<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalistTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Analist', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('Nombre');
            $table->longText('Apellido');
            $table->longText('Cedula');
            $table->longText('Departamento');
            $table->longText('Cargo');
            $table->longText('Area');
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
        Schema::drop('Analist');
    }
}
