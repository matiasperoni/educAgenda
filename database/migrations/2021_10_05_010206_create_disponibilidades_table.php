<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisponibilidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disponibilidade', function (Blueprint $table) {
            $table->id();
            $table->time('horaInicio');
            $table->time('horaFim');
            $table->date('data');
            $table->bigInteger('aluno_id')->unsigned();
            $table->foreign('aluno')->references('id')->on('aluno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disponibilidade');
    }
}
