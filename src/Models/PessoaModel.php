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
        'email',
        'created_at' ,
        'updated_at ',
    ];

    public function endereco()
    {
        return $this->belongsTo(EnderecoModel::class, 'endereco_id');
    }

    public function pessoaAcademia()
    {
        return $this->hasMany(PessoaAcademiaModel::class, 'pessoa_id');
    }

    public function tempoFicha()
    {
        return $this->hasMany(TempoFichaModel::class, 'pessoa_id');
    }

    public function pessoaTipoPessoa()
    {
        return $this->hasMany(PessoaTipoPessoaModel::class, 'pessoa_id');
    }

    public function checkin()
    {
        return $this->hasMany(CheckinModel::class, 'pessoa_id');
    }
}
