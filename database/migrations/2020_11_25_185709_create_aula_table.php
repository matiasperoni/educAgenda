<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('aula', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('professor_id')->unsigned();
            $table->foreign('professor_id')->references('id')->on('professor');
            $table->bigInteger('materia_id')->unsigned();
            $table->foreign('materia_id')->references('id')->on('materia');
            $table->bigInteger('horario_id')->unsigned();
            $table->foreign('horario_id')->references('id')->on('horario');
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
        Schema::dropIfExists('aula');
    }
}
