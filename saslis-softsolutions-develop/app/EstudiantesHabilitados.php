<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstudiantesHabilitados extends Model
{
    protected $table = 'estudiantes_habilitados';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
