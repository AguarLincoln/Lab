<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_da_empresa');
            $table->string('cnpj');
            $table->string('email')->unique();
            $table->string('telefone');

            $table->string('nome_representante');
            $table->string('cpf_representante');
            $table->string('email_representante')->unique();
            $table->string('telefone_representante');

            $table->string('endereco');
            $table->string('numero');
            $table->string('bairro');
            $table->string('complemento');
            $table->string('cep');
            $table->string('cidade');
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
        Schema::dropIfExists('empresa');
    }
}
