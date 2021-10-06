<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('formacao', 150);
            $table->string('cpf/cnpj', 18);
            $table->text('descricao');
            $table->string('endereco', 150);
            $table->string('bairro', 50);
            $table->string('cidade', 50);
            $table->bigInteger('especialidade_id')->unsigned();
            $table->foreign('especialidade')->references('id')->on('especialidade');
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
        Schema::dropIfExists('professor');
    }
}
