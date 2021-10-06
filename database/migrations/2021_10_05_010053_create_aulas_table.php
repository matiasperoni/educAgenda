<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->time('horaInicio');
            $table->time('horaFim');
            $table->date('data');
            $table->string('status');
            $table->bigInteger('aluno_id')->unsigned();
            $table->foreign('aluno')->references('id')->on('aluno');
            $table->bigInteger('professor_id')->unsigned();
            $table->foreign('professor')->references('id')->on('professor');
            
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
