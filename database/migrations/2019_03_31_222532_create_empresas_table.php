<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cnpj', 18);
            $table->string('razao_social', 255);
            $table->string('nome', 255);
            $table->integer('cep');
            $table->text('logradouro');
            $table->string('numero', 20);
            $table->string('telefone', 11);
            $table->string('email', 255);
            $table->text('complemento')->nullable();
            $table->text('bairro');
            $table->text('cidade');
            $table->string('estado', 2);
            $table->tinyInteger('segmento');
            $table->text('inscricao_municipal');
            $table->text('inscricao_estadual')->nullable();
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
        Schema::dropIfExists('empresas');
    }
}
