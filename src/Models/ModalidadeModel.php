<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModalidadeModel extends Model
{
    protected $table = 'Modalidades';
    protected $fillable = [
        'nome',
        'slug',
        'descricao',
        'objetivo',
    ];
}
