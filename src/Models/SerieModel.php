<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SerieModel extends Model
{
    protected $table = 'Series';
    protected $fillable = [
        'repeticoes_id',
        'exercicio_id',
        'carga_id',
    ];
}