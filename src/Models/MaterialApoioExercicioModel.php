<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialApoioExercicioModel extends Model
{
    protected $table = 'Materiais_apoio_exercicios';
    protected $fillable = [
        'titulo',
        'tipo',
        'url',
    ];
}