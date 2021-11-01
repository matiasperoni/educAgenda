<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pessoa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome' ,50);
            $table->bigInteger('especialidade_id')->unsigned();
            $table->foreign('especialidade_id')->references('id')->on('especialidade');
            $table->string('cpf/cnpj' ,20);
            $table->string('endereco' ,100);
            $table->string('bairro' ,100);
            $table->string('cidade' ,50);
            $table->string('professor' ,100);
            $table->string('email' ,50);
            $table->string('senha' ,20);
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
        Schema::dropIfExists('pessoa');
    }
}
