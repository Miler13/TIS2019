<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuxiliarLaboratorio extends Model
{
    protected $table = 'registro_aux_lab';
    protected $primaryKey = 'id_regis';
    public $timestamps = false;
}
