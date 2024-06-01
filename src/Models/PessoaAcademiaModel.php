<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PessoaAcademiaModel extends Model
{
    protected $table = 'Pessoas_Academias';
    protected $fillable = [
        'academia_id',
        'pessoa_id',
    ];
}
