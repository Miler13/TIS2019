<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    protected $table = 'laboratorios';
    protected $primaryKey = 'numero_lab';
    public $timestamps = false;
}
