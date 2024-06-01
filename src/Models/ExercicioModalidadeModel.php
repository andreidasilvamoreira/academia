<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExercicioModalidadeModel extends Model
{
    protected $table = 'Exercicios_Modalidade';
    protected $fillable = [
        'exercicio_id',
        'modalidade_id',
    ];
}
