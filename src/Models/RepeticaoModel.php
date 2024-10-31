<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepeticaoModel extends Model
{
    public $timestamps = false;

    protected $table = 'Repeticoes';
    protected $fillable = [
        'quantidade_repeticoes',
        'tempo_descanso',
    ];

    public function serie()
    {
        return $this->hasMany(SerieModel::class, 'repeticao_id');
    }
}