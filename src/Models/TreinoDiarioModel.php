<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TreinoDiarioModel extends Model
{

    public $timestamps = false;

    protected $table = 'Treinos_Diario';
    protected $fillable = [
        'nome',
        'slug',
        'ficha_treino_id',
        'checkin_id',
    ];

    public function treinoDiarioExercicio()
    {
        return $this->hasMany(TreinoDiarioExercicioModel::class, 'treino_diario_id');
    }

    public function fichaTreino()
    {
        return $this->hasMany(FichaTreinoModel::class, 'treino_diario_id');
    }

    public function checkin()
    {
        return $this->hasMany(CheckinModel::class, 'treino_diario_id');
    }
}