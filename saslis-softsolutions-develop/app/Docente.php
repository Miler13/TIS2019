<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Docente extends Authenticatable
{
    protected $table = 'docentes';
    protected $primaryKey = 'codsis_doc';
    public $timestamps = false;
}
