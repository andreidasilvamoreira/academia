<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPessoaModel extends Model
{
    protected $table = 'Tipo_Pessoas';

    public $timestamps = false;


    protected $fillable = [
        'nome',
        'slug',
    ];

    public function tipoPessoa()
    {
        return $this->hasMany(TipoPessoaModel::class, 'tipo_pessoa_id');
    }
}
