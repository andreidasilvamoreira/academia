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

    public function Pessoas()
    {
        return $this->belongsToMany(PessoaModel::class, 'Pessoas_Tipo_Pessoas','tipo_pessoa_id','pessoa_id');
    }
}
