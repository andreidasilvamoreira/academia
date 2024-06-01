<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckinModel extends Model
{
    protected $table = 'Checkins';
    protected $fillable = [
        'data_check_in',
        'duracao_treino',
        'motivo_status',
        'pessoa_id',
        'status_id',
    ];
}
