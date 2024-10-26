<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusModel extends Model
{
    public $timestamps = false;

    protected $table = 'Status';
    protected $fillable = [
        'nome',
        'slug',
    ];
}