<?php

namespace App\Http\Controllers;
use DB;
use App\registro;
use App\userlevels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class monitoreo extends Controller
{   
    public function GetSemana($semana){
        Auth::user()->profile == 1? :abort(403,'Forbidden'); 
        $Registro = new registro;
        $Registros = $Registro->ModificarAdmin($semana);
        return view('monitoreo.modificar.modificar_admin',[
            'Registros' => $Registros,
            'level' => userlevels::find(Auth::user()->profile)
        ]);
    
    }
    public function habilitarreg(Request $request){
        Auth::user()->profile == 1? :abort(403,'Forbidden'); 
        foreach ($request->all() as $R) {
            $toUpdate = [
                'lapsed' =>  array_key_exists('habilitar',$R)? 1: null
            ];
            $toUpdate['lapsed'] ? registro::where('idregistro',$R['idregistro'])->update($toUpdate):'';
        }
        return response()->json([
            'message' => 'Guardado con éxito'
        ]);
    }
    public function Eliminar(){
        return view('monitoreo.eliminar',[
            'level' => userlevels::find(Auth::user()->profile)
        ]);
    }
    public function ResultadosBacteriologicos(){
        return view('monitoreo.resultados_bacteriologicos',[
            'level' => userlevels::find(Auth::user()->profile)
        ]);
    }
}
