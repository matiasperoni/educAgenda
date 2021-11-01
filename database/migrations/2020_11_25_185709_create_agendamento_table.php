<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('agendamento', function (Blueprint $table) {
            $table->bigIncrements('agendamento_id');
            //$table->bigInteger('aula_id')->unsigned();
            //$table->foreign('aula_id')->references('id')->on('aula');
            
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
