<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class Gastos extends Model
{
    use SoftDeletes; //Implementamos 
    //
    protected $dates = ['deleted_at']; //Registramos la nueva columna
}
