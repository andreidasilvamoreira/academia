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
}
