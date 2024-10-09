<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExercicioModel extends Model
{

    public $timestamps = false;

    protected $table = 'Exercicios';
    protected $fillable = [
        'nome',
        'musculatura_alvo',
        'dificuldade',
        'quantidade_series',
        'descricao',
        'concluido',
        'equipamentos_necessarios',
        'material_apoio_id',
    ];
}
