<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gest extends Model
{
    protected $table = 'gestiones';
    protected $primaryKey = 'cod_gestion';
    public $timestamps = false;}
