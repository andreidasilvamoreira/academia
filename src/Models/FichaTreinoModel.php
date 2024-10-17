<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FichaTreinoModel extends Model
{

    public $timestamps = false;

    protected $table = 'Fichas_Treino';
    protected $fillable = [
        'objetivos',
        'experiencia',
        'recomendacoes_medicas',
        'condicoes_medicas',
        'treinador_responsavel_id',
        'objetivo',
        'academia_id',
        'tempo_ficha_id',
    ];
}
