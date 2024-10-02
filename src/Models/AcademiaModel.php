<?php

namespace App\Models;

use App\Models\AcademiaModalidadeModel;
use Illuminate\Database\Eloquent\Model;

class AcademiaModel extends Model
{
    protected $table = 'Academias';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'telefone',
        'horario_funcionamento_abertura',
        'horario_funcionamento_fechamento',
        'endereco_id',
    ];

    public function modalidades()
    {
        return $this->hasMany(AcademiaModalidadeModel::class, 'academia_id');
    }
}
