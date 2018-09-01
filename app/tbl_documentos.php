<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_documentos extends Model
{
    protected $fillable = [
        'titulo','descripcion','tamanio','tipo','nombre_archivo'
    ];
    public $timestamps =false;
}
