<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstudianteLaboratorio extends Model
{
    protected $table = 'registro_est_lab';
    protected $primaryKey = 'id_reg';
    public $timestamps = false;
}
