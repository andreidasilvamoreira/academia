<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CargaModel extends Model
{

    public $timestamps = false;

    protected $table = 'Cargas';
    protected $fillable = [
        'numero_cargas',
    ];
}
