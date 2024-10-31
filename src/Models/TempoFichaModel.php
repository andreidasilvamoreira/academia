<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempoFichaModel extends Model
{

    public $timestamps = false;

    protected $table = 'Tempo_Fichas';
    protected $fillable = [
        'data_inicio',
        'data_fim',
        'quantidade_dias',
        'pessoa_id',
    ];

    public function fichaTreino()
    {
        return $this->hasMany(FichaTreinoModel::class, 'tempo_ficha_id');
    }

    public function pessoa()
    {
        return $this->hasMany(PessoaModel::class, 'tempo_ficha_id');
    }
}