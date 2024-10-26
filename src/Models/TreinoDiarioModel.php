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
}