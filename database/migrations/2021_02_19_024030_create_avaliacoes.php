<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id');
            $table->foreignId('turma_id');

            $table->decimal('ap1', $precision = 4, $scale = 2)->nullable();
            $table->decimal('ap2', $precision = 4, $scale = 2)->nullable();
            $table->decimal('ap3', $precision = 4, $scale = 2)->nullable();
            $table->string('relatorio')->nullable();
            $table->timestamps();


            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->foreign('turma_id')->references('id')->on('turmas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacoes');
    }
}
