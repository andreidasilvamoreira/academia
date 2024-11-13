<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PessoaModel extends Model
{
    protected $table = 'pessoas';

    public $timestamps = false;

    protected $fillable = [
        'endereco_id',
        'nome',
        'cpf',
        'altura',
        'peso',
        'data_matricula',
        'data_nascimento',
        'senha',
        'email'
    ];

    public function endereco()
    {
        return $this->belongsTo(EnderecoModel::class, 'endereco_id');
    }

    public function academia()
    {
        return $this->belongsToMany(AcademiaModel::class, 'pessoas_academias','pessoa_id', 'academia_id');
    }

    public function tempoFicha()
    {
        return $this->hasMany(TempoFichaModel::class, 'pessoa_id');
    }

    public function tipoPessoa()
    {
        return $this->belongsToMany(TipoPessoaModel::class, 'Pessoas_Tipo_Pessoas', 'pessoa_id', 'tipo_pessoa_id');
    }

    public function checkin()
    {
        return $this->hasMany(CheckinModel::class, 'pessoa_id');
    }
}
