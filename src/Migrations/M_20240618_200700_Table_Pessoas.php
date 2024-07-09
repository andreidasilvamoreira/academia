<?php

namespace App\Migrations;

use Illuminate\Database\Schema\Blueprint;

class M_20240618_200700_Table_Pessoas
{

    public function up()
    {
        $this->schema()->create('pessoas', function (Blueprint $table) {
            $table->id()->comment('Chave primária');
            $table->string('nome')->comment('Nome completo');
            $table->string('cpf')->nullable()->comment('CPF apenas numeros');
            $table->string('email')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->bigInteger('celular')->nullable()->comment('Celular com DDD');
            $table->bigInteger('telefone')->nullable()->comment('Telefone com DDD');
            $table->string('rg')->nullable()->comment('RG');
            $table->string('orgao_expedidor')->nullable()->comment('Orgão expedidor|emissor do documento');
            $table->foreignId('rg_uf_id')->nullable()->comment('Estado onde o rg foi emitido');
            $table->foreignId('estado_civil_id')->nullable()->comment('FK da tabela de estados civis');
        });
    }

    public function down()
    {
        $this->schema()->dropIfExists('pessoas');
    }
}
