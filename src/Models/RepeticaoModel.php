<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepeticaoModel extends Model
{
    protected $table = 'Repeticoes';
    protected $fillable = [
        'quantidade_repeticoes',
        'tempo_descanso',
    ];
}