<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnderecoModel extends Model
{
    protected $table = 'enderecos';

    public $timestamps = false;

    protected $fillable = [
        'CEP',
        'rua',
        'bairro',
        'cidade',
        'complemento',
    ];
}
