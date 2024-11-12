<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModalidadeModel extends Model
{

    public $timestamps = false;

    protected $table = 'Modalidades';
    protected $fillable = [
        'nome',
        'slug',
        'descricao',
        'objetivo',
    ];

    public function academias()
    {
        return $this->belongsToMany(AcademiaModel::class, 'academias_modalidades','modalidade_id', 'academia_id');
    }

    public function exercicios()
    {
        return $this->belongsToMany(ExercicioModel::class, 'exercicio_modalidade', 'modalidade_id', 'exercicio_id');
    }
}
