<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocenteMateria extends Model
{
    protected $table = 'docentes_materias';
    protected $primaryKey = 'id_doc_mat';
    public $timestamps = false;
}
