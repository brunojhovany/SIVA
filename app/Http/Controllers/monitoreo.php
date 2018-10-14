<?php

namespace App\Http\Controllers;
use DB;
use App\registro;
use App\userlevels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class monitoreo extends Controller
{
    public function Modificar () {
        $levelUSR = Auth::user()->profile;
        $lv = userlevels::find($levelUSR);
        return view('monitoreo.modificar',[
            'level' =>$lv
        ]);
    }
    public function GetSemana($semana){
        $Registro = new registro;
        $Registros = $Registro->ModificarAdmin($semana);
        return response()->json([
            'html' => view('monitoreo.modificar.modificartable',compact('Registros'))->render()
        ]);
    }
    public function Eliminar(){
        return view('monitoreo.eliminar');
    }
    public function ResultadosBacteriologicos(){
        return view('monitoreo.resultados_bacteriologicos');
    }
}
