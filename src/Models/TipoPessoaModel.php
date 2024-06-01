<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPessoaModel extends Model
{
    protected $table = 'Tipos_Pessoas';
    protected $fillable = [
        'nome',
        'slug',
    ];
}
