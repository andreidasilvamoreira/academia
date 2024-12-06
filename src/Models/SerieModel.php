<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SerieModel extends Model
{

    public $timestamps = null;

    protected $table = 'Series';
    protected $fillable = [
        'repeticoes_id',
        'exercicio_id',
        'carga_id',
    ];

    public function exercicio()
    {
        return $this->belongsTo(ExercicioModel::class, 'serie_id');
    }

    public function carga()
    {
        return $this->hasMany(CargaModel::class, 'serie_id');
    }

    public function repeticao()
    {
        return $this->hasMany(RepeticaoModel::class, 'serie_id');
    }
}