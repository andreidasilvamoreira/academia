<?php

namespace App\Models;

use App\Entities\Academia;
use App\Models\ModalidadeModel;
use Illuminate\Database\Eloquent\Model;

class AcademiaModalidadeModel extends Model
{
    protected $table = 'Academias_Modalidades';
    protected $fillable = [
        'academia_id',
        'modalidade_id',
    ];

    public $timestamps = false;
    public function modalidade()
    {
        return $this->belongsTo(ModalidadeModel::class, 'modalidade_id');
    }

    public function academia()
    {
        return $this->belongsTo(AcademiaModel::class, 'academia_id');
    }
}
