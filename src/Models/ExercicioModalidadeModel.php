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

    public function modalidade()
    {
        return $this->belongsTo(ModalidadeModel::class, 'modalidade_id');
    }

    public function exercicio()
    {
        return $this->belongsTo(ExercicioModel::class, 'exercicio_id');
    }
}
