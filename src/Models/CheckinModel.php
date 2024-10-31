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

    public function status()
    {
        return $this->hasMany(StatusModel::class, 'checkin_id');
    }

    public function treinoDiario()
    {
        return $this->hasMany(TreinoDiarioModel::class, 'checkin_id');
    }

    public function pessoas()
    {
        return $this->belongsTo(PessoaModel::class, 'pessoa_id');
    }
}
