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
}