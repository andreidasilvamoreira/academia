<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempoFichaModel extends Model
{
    protected $table = 'Tempo_Fichas';
    protected $fillable = [
        'data_inicio',
        'data_fim',
        'quantidade_dias',
        'pessoa_id',
    ];
}