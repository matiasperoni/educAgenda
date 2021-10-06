<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamento', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('data');
            $table->time('hora');
            $table->bigInteger('disponibilidade_id')->unsigned();
            $table->foreign('disponibilidade')->references('id')->on('disponibilidade');
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
        Schema::dropIfExists('agendamento');
    }
}
