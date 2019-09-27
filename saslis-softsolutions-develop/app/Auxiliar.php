<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Auxiliar extends Authenticatable
{
    protected $table = 'auxiliares';
    protected $primaryKey = 'id_auxiliar';
    public $timestamps = false;
}
