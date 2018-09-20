<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class registro extends Model
{
    protected $table ='registro';
    public $timestamps = false;

    public function MoreThanOnce (){
        return $this::select()->leftJoin('municipio as M','M.idmunicipio','registro.idmunicipio')->
        leftJoin('localidades as L','L.idlocalidades','registro.idlocalidades')->where('registro.status',0)->paginate(5);
    }
    public function GetReportByWeek($request){
        return $this::leftJoin('municipio as M','M.idmunicipio','registro.idmunicipio')
        ->leftJoin('localidades as L','L.idlocalidades','registro.idlocalidades')
        ->leftJoin(DB::raw('(SELECT id,name from users) as U'),'U.id','registro.user_id')
        ->whereRaw("yearweek(f,1) = $request->year_select$request->week_select")
        ->where('registro.status',1)->get();
    }
}
