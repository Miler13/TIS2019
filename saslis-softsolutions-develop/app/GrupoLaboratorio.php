<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoLaboratorio extends Model
{
    protected $table = 'grupo_laboratorio';
    protected $primaryKey = 'id_grupo_lab';
    public $timestamps = false;
}
