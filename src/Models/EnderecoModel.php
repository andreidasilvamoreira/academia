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

    public function pessoa()
    {
        return $this->hasMany(PessoaModel::class, 'endereco_id');
    }

    public function academia()
    {
        return $this->hasMany(AcademiaModel::class, 'endereco_id');
    }
}
