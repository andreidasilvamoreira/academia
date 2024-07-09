<?php

namespace App\Migrations;

class S_20240618_231400_Seed_Cursos
{
    public function up()
    {
        $cursos = [
            ['nome' => 'Banco de Dados', 'slug' => 'banco-de-dados'],
            ['nome' => 'Licenciatura em Ciência da Computação', 'slug' => 'licenciatura-em-ciencia-da-computacao'],
            ['nome' => 'Ciências Econômicas', 'slug' => 'ciencias-economicas'],
            ['nome' => 'Ciências Jurídicas e Sociais', 'slug' => 'ciencias-juridicas-e-sociais'],
        ];

        foreach ($cursos as &$curso) {
            $curso['valor_mensalidade'] = 94.99;
//            $curso['created_at'] = now();
//            $curso['updated_at'] = now();
        }

        $this->db->query()->from('cursos')->insert($cursos);
    }

    public function down()
    {
    }
}
