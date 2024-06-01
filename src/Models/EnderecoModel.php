<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnderecoModel extends Model
{
    protected $table = 'Enderecos';
    protected $fillable = [
        'CEP',
        'rua',
        'bairro',
        'cidade',
        'complemento',
    ];
}
