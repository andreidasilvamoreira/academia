<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckinModel extends Model
{

    public $timestamps = false;

    protected $table = 'Checkins';
    protected $fillable = [
        'data_check_in',
        'duracao_treino',
        'motivos_status',
        'pessoa_id',
        'status_id',
    ];
}
