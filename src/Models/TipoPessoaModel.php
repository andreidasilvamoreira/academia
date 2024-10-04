<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPessoaModel extends Model
{
    public $timestamps = false;
    protected $table = 'Tipo_Pessoas';
    protected $fillable = [
        'nome',
        'slug',
    ];
}
