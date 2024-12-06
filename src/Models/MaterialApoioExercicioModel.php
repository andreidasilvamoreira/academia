<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialApoioExercicioModel extends Model
{

    public $timestamps = false;

    protected $table = 'Materiais_apoio_exercicios';
    protected $fillable = [
        'titulo',
        'tipo',
        'url',
    ];

    public function exercicio()
    {
        return $this->hasOne(ExercicioModel::class, 'material_apoio_exercicio_id');
    }
}