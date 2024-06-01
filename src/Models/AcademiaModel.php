<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademiaModel extends Model
{
    protected $table = 'Academias';
    protected $fillable = [
        'nome',
        'telefone',
        'horario_funcionamento_abertura',
        'horario_funcionamento_fechamento',
        'endereco_id',
    ];
}
