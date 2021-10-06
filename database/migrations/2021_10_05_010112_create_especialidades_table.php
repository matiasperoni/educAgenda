<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidade', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('formacao', 150);
            $table->int('anoFormacao');
            $table->string('instituicao', 50);
            $table->text('descricao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialidade');
    }
}
