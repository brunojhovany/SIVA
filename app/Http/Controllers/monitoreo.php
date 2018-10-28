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
        $Registro = new registro;
        $Registros = $Registro->ModificarAdmin($semana);
        return view('monitoreo.modificar.modificar_admin',[
            'Registros' => $Registros,
            'level' => userlevels::find(Auth::user()->profile)
        ]);
    
    }
    public function Eliminar(){
        return view('monitoreo.eliminar');
    }
    public function ResultadosBacteriologicos(){
        return view('monitoreo.resultados_bacteriologicos');
    }
}
