<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulaArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula_arquivos', function (Blueprint $table) {
            $table->timestamps();
            $table->bigInteger('aula_id')->unsigned();
            $table->foreign('aula_id')->references('id')->on('aula')->onDelete('cascade');
            $table->bigInteger('arquivo_id')->unsigned();
            $table->foreign('arquivo_id')->references('id')->on('arquivo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aula_arquivos');
    }
}
