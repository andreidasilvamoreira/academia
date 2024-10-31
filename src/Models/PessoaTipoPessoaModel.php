<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PessoaTipoPessoaModel extends Model
{
    protected $table = 'Pessoas_Tipo_Pessoas';
    protected $fillable = [
        'pessoa_id',
        'tipo_pessoa_id',
    ];

    public function pessoa()
    {
        return $this->belongsTo(PessoaModel::class, 'pessoa_id');
    }

    public function tipoPessoa()
    {
        return $this->belongsTo(TipoPessoaModel::class, 'tipo_pessoa_id');
    }
}
