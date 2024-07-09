<?php

namespace App\Migrations;

use Illuminate\Database\Schema\Blueprint;

class M_20240618_204900_Constraints
{
    public function up()
    {
        //EDITAIS
        $this->schema()->table('editais', function (Blueprint $table) {
            $table->foreign('situacao_edital_id')
                ->references('id')
                ->on('situacoes_edital');
        });

        $this->schema()->table('situacao_edital_historicos', function (Blueprint $table) {
            $table->foreign('edital_id')
                ->references('id')
                ->on('editais');
            $table->foreign('situacao_edital_id')
                ->references('id')
                ->on('situacoes_edital');
        });

        $this->schema()->table('polos_chamadas_editais', function (Blueprint $table) {
            $table->foreign('polo_id')
                ->references('id')
                ->on('polos');
            $table->foreign('edital_id')
                ->references('id')
                ->on('editais');
            $table->foreign('chamada_id')
                ->references('id')
                ->on('chamadas');
        });

        //DOCUMENTOS
        $this->schema()->table('documento_pendencias', function (Blueprint $table) {
            $table->foreign('tipo_pendencia_id')
                ->references('id')
                ->on('tipos_pendencia_documento');
        });

        $this->schema()->table('documentos', function (Blueprint $table) {
            $table->foreign('tipo_documento_id')
                ->references('id')
                ->on('tipos_documento');
            $table->foreign('situacao_documento_id')
                ->references('id')
                ->on('situacoes_documento');
            $table->foreign('documento_pendencia_id')
                ->references('id')
                ->on('documento_pendencias');
        });

        $this->schema()->table('tipos_documento', function (Blueprint $table) {
            $table->foreign('tipo_documento_grupo_id')
                ->references('id')
                ->on('tipo_documento_grupos');
        });

        $this->schema()->table('documento_situacao_historicos', function (Blueprint $table) {
            $table->foreign('situacao_documento_id')
                ->references('id')
                ->on('situacoes_documento');
            $table->foreign('documento_id')
                ->references('id')
                ->on('documentos');
            $table->foreign('documento_pendencia_id')
                ->references('id')
                ->on('documento_pendencias');
        });

        //BOLSISTA
        $this->schema()->table('bolsistas', function (Blueprint $table) {
            $table->foreign('pessoa_id')
                ->references('id')
                ->on('pessoas');
            $table->foreign('polo_chamada_edital_id')
                ->references('id')
                ->on('polos_chamadas_editais');
            $table->foreign('situacao_bolsista_id')
                ->references('id')
                ->on('situacoes_bolsista');
            $table->foreign('endereco_id')
                ->references('id')
                ->on('enderecos');
            $table->foreign('curso_id')
                ->references('id')
                ->on('cursos');
        });

        $this->schema()->table('situacao_bolsista_historicos', function (Blueprint $table) {
            $table->foreign('bolsista_id')
                ->references('id')
                ->on('bolsistas');
            $table->foreign('situacao_bolsista_id')
                ->references('id')
                ->on('situacoes_bolsista');
        });

        $this->schema()->table('enderecos', function (Blueprint $table) {
            $table->foreign('estado_id')
                ->references('id')
                ->on('estados');
        });

        $this->schema()->table('pessoas', function (Blueprint $table) {
            $table->foreign('estado_civil_id')
                ->references('id')
                ->on('estados_civis');
            $table->foreign('rg_uf_id')
                ->references('id')
                ->on('estados');
        });

        $this->schema()->table('pessoa_documentos', function (Blueprint $table) {
            $table->foreign('documento_id')
                ->references('id')
                ->on('documentos');
            $table->foreign('pessoa_id')
                ->references('id')
                ->on('pessoas');
        });

        $this->schema()->table('moradores', function (Blueprint $table) {
            $table->foreign('bolsista_id')
                ->references('id')
                ->on('bolsistas');
            $table->foreign('pessoa_id')
                ->references('id')
                ->on('pessoas');
            $table->foreign('tipo_morador_id')
                ->references('id')
                ->on('tipos_morador');
        });
    }

    public function down()
    {
    }
}
