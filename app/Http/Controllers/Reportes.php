<?php

namespace App\Http\Controllers;
use App\userlevels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Reportes extends Controller
{
   public function reporte_mensual(){

    return view('reporte.reporte_mensual_de_municipio.reporte_mensual_municipio',[
       'level' => userlevels::find(Auth::user()->profile)
    ]);
   }

   public function reporte_localidad(){
      return view('reporte.reporte_por_localidad.reporte_localidad',[
         'level' => userlevels::find(Auth::user()->profile)
      ]);
   }

}
