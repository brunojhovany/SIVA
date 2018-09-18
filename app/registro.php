<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registro extends Model
{
    protected $table ='registro';
    public $timestamps = false;

    public function MoreThanOnce (){
        return $this::select()->leftJoin('municipio as M','M.idmunicipio','registro.idmunicipio')->
        leftJoin('localidades as L','L.idlocalidades','registro.idlocalidades')->where('registro.status',0)->paginate(5);
    }
}
