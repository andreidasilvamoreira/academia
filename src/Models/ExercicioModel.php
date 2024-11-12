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

    public function Modalidades()
    {
        return $this->belongsToMany(ModalidadeModel::class, 'exercicio_modalidade','exercicio_id', 'modalidade_id');
    }

    public function treinoDiarioExercicio()
    {
        return $this->hasMany(TreinoDiarioExercicioModel::class, 'exercicio_id');
    }

    public function materiaisApoioExercicio()
    {
        return $this->hasMany(MaterialApoioExercicioModel::class, 'exercicio_id');
    }

    public function serie()
    {
        return $this->hasMany(SerieModel::class, 'exercicio_id');
    }
}
