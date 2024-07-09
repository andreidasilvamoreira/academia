<?php

namespace App\Migrations;

use Illuminate\Database\Schema\Blueprint;

class M_20240618_195700_Table_Bolsistas
{

    public function up()
    {
        $this->schema()->create('bolsistas', function (Blueprint $table) {
            $table->id()->comment('Chave primária');
            $table->foreignId('pessoa_id')->comment('FK da tabela de pessoas');
            $table->foreignId('situacao_bolsista_id')->comment('FK da tabela de situação bolsistas');
            $table->foreignId('curso_id')->comment('fk da tabela de curso');
            $table->integer('codigo')->comment('Codigo fornecido pelo usuario');
            $table->float('nota_media')->comment('media da nota do enem');
            $table->foreignId('polo_chamada_edital_id')->comment('FK da tabela de polo chamada edital');

            $table->foreignId('endereco_id')->nullable()->comment('FK da tabela de endereços');
            $table->string('tipo_bolsa')->nullable()->comment('o tipo da bolsa, por exemplo BOLSA INTEGRAL');
            $table->string('turno')->nullable()
                ->comment('o turno da bolsa, por exemplo CURSO A DISTÂNCIA, noturno, matutino');
            $table->integer('contrato_id')->nullable()
                ->comment('fk do contrato id do sigue contratos, vai ser o RA do aluno');
            $table->string('observacao_analise_socieconomica')->nullable()
                ->comment('Descrever informações sobre o candidato e grupo familiar');
            $table->string('email_conta_gran')->nullable()
                ->comment('Email que o aluno já possui conta no gran');
        });
    }

    public function down()
    {
        $this->schema()->dropIfExists('bolsistas');
    }
}
