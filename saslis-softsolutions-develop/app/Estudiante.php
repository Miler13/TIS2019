<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Estudiante extends Authenticatable
{
    protected $table = 'estudiantes';
    protected $primaryKey = 'codsis_est';
    public $timestamps = false;
}
