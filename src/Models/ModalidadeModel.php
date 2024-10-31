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
        return $this->hasMany(AcademiaModalidadeModel::class, 'modalidade_id');
    }

    public function exercicioModalidade()
    {
        return $this->hasMany(ExercicioModalidadeModel::class, 'modalidade_id');
    }
}
