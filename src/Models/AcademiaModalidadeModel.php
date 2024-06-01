<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademiaModalidadeModel extends Model
{
    protected $table = 'Academias_Modalidades';
    protected $fillable = [
        'academia_id',
        'modalidade_id',
    ];
}
