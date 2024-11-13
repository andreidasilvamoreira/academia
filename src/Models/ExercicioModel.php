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

    public function modalidades()
    {
        return $this->belongsToMany(ModalidadeModel::class, 'exercicio_modalidade','exercicio_id', 'modalidade_id');
    }

    public function treinoDiario()
    {
        return $this->belongsToMany(TreinoDiarioModel::class, 'Treinos_Diario_Exercicios','exercicio_id','treino_diario_id');
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
