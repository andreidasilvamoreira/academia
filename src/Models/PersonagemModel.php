<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonagemModel extends Model
{
    protected $table = 'personagens';
    protected $fillable = [
        'nome',
        'nivel',
        'total_vida',
        'total_vida_bonus',
        'vida_atual',
        'experiencia',
        'raca_id',
        'classe_id',
    ];
}
