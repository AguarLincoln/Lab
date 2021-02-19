<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoVagas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_vagas', function (Blueprint $table) {
            $table->foreignId('aluno_id');
            $table->foreignId('vaga_id');

            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->foreign('vaga_id')->references('id')->on('vagas');
            $table->primary('aluno_id', 'vaga_id');
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
        Schema::dropIfExists('aluno_vagas');
    }
}
