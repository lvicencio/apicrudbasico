<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table =  'estudiantes';

    protected $fillable = ['nombre','apellido','email','password'];
}
