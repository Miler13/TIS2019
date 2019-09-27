<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstudianteMateria extends Model
{
    protected $table = 'registro_est_mat';
    protected $primaryKey = 'id_registro';
    public $timestamps = false;
}
