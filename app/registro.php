<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class registro extends Model
{
    protected $table ='registro';
    public $timestamps = false;

    public function MoreThanOnce ($usario){
        $query = $this::select()->leftJoin('municipio as M','M.idmunicipio','registro.idmunicipio')->
        leftJoin('localidades as L','L.idlocalidades','registro.idlocalidades')
        ->whereRaw("yearweek(f,1) = yearweek(current_date,1)")
        ->where('registro.status',0);

        $retVal = $usario->profile == 2 ? 
            $query->where('M.idjurisdiccion', $usario->jurisdiccion)
        : 'ok';


        return $query->paginate(5);
    }
    public function GetReportByWeek($yearwithweek){
        return $this::leftJoin('municipio as M','M.idmunicipio','registro.idmunicipio')
        ->leftJoin('localidades as L','L.idlocalidades','registro.idlocalidades')
        ->leftJoin(DB::raw('(SELECT id,name from users) as U'),'U.id','registro.user_id')
        ->whereRaw("yearweek(f,1) = $yearwithweek")
        ->where('registro.status',1)->paginate(5);
    }

    public function ModificarAdmin($yearwithweek){
        return $this::select()->leftJoin('municipio as M','M.idmunicipio','registro.idmunicipio')->
        leftJoin('localidades as L','L.idlocalidades','registro.idlocalidades')->whereRaw("yearweek(f,1) = $yearwithweek")->where('registro.status',0)->where('registro.lapsed',0)->paginate(5);
    }

    public static function ResultadosBactereologicos($Month){
       return DB::table('registro')->leftJoin('municipio as M','M.idmunicipio','registro.idmunicipio')
        ->leftJoin('localidades as L','L.idlocalidades','registro.idlocalidades')
        ->leftJoin(DB::raw('(SELECT id,name from users) as U'),'U.id','registro.user_id')
        ->whereRaw("MONTH(fecha) = $Month")
        ->whereRaw('YEAR(fecha) = year(curdate())')
        ->where('registro.status',1)->paginate(4);
    }
}
