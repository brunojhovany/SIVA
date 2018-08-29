<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class avisos_informativos extends Model
{
    protected $fillable = [
        'descripcion_aviso'
    ];
    public $timestamps =false;
}
