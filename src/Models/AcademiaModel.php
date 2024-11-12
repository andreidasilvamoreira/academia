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
        return $this->belongsToMany(ModalidadeModel::class, 'academias_modalidades', 'academia_id', 'modalidade_id');
    }

    public function pessoasAcademia()
    {
        return $this->hasMany(PessoaAcademiaModel::class, 'academia_id');
    }

    public function fichasTreino()
    {
        return $this->hasMany(FichaTreinoModel::class, 'academia_id');
    }

    public function enderecos()
    {
        return $this->belongsTo(EnderecoModel::class, 'endereco_id');
    }
}
