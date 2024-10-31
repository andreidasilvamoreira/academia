<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TreinoDiarioExercicioModel extends Model
{
    protected $table = 'Treinos_Diario_Exercicios';
    protected $fillable = [
        'treino_diario_id',
        'exercicio_id',
    ];

    public function exercicio()
    {
        return $this->belongsTo(ExercicioModel::class, 'exercicio_id');
    }

    public function tipoPessoa()
    {
        return $this->belongsTo(TipoPessoaModel::class, 'tipo_pessoa_id');
    }
}