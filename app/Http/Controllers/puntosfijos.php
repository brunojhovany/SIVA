<?php

namespace App\Http\Controllers;
use DB;
use App\userlevels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class puntosfijos extends Controller
{
    public function solounaves(){
        $levelUSR = Auth::user()->profile;
        $lv = userlevels::findOrFail($levelUSR);
        $query = DB::table('municipio')->select('idmunicipio','nombreM')->get();
        $Municipios = DB::table('municipio')->select('idmunicipio','nombreM')->get();
        return view('puntosfijos.onlyone',[
            'level' => $lv,
            'Municipios' => []
        ]);
    }
    public function Municipios(Request $request){
        $query = DB::table('municipio')->select('idmunicipio','nombreM')->get();
        return response()->json([
            'Municipios' => view('selects.municipios',compact('query'))->render()
        ]);
    }
    public function Localidades(Request $request){
        $query = DB::table('localidades')->select('idlocalidades','nombreL')->where('idmunicipio','=',"$request->idmunicipio")->get();
        return response()->json([
            'Municipios' => view('selects.localidades',compact('query'))->render()
        ]);
    }
    public function Direccion(Request $request){
        $query = DB::table('localidades')->select('idlocalidades','nombreL')->where('idmunicipio','=',"$request->idmunicipio")->get();
        return response()->json([
            'Municipios' => view('selects.direccion',compact('query'))->render()
        ]);
    }
}
