<?php

namespace App\Http\Controllers;
use DB;
use App\registro;
use App\userlevels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function Index(){
        $levelUSR = Auth::user()->profile;
        $lv = userlevels::findOrFail($levelUSR);
        if (Auth::user()->profile  == 1){
            return view('configuracion.admin',[
                'level' => $lv
            ]);
        }
        else 
        abort(403,'Forbidden');
    }
    public function AdmonUsers(){
        $levelUSR = Auth::user()->profile;
        $lv = userlevels::findOrFail($levelUSR);
        if (Auth::user()->profile  == 1){
            return view('configuracion.admon_users',[
                'level' => $lv
            ]);
        }
        else 
        abort(403,'Forbidden');
    }
    public function AdmonNotifictions(){
        $levelUSR = Auth::user()->profile;
        $lv = userlevels::findOrFail($levelUSR);
        if (Auth::user()->profile  == 1){
            return view('configuracion.notifications',[
                'level' => $lv
            ]);
        }
        else 
        abort(403,'Forbidden');
    }
    public function AdmonGuides(){
        $levelUSR = Auth::user()->profile;
        $lv = userlevels::findOrFail($levelUSR);
        if (Auth::user()->profile  == 1){
            return view('configuracion.guides',[
                'level' => $lv
            ]);
        }
        else 
        abort(403,'Forbidden');
    }
    public function AdmonRegister(){
        $levelUSR = Auth::user()->profile;
        $lv = userlevels::findOrFail($levelUSR);
        if (Auth::user()->profile  == 1){
            return view('configuracion.pre_register',[
                'level' => $lv
            ]);
        }
        else 
        abort(403,'Forbidden');
    }
    public function AdmonRegisterSave(Request $request){
        if(Auth::user()->profile  == 1){
            $claveLocalidad=DB::table('localidades')->select('clave')->where('idlocalidades','=',"$request->Localidad")->first();
            $claveLocalidad = $claveLocalidad->clave;
            $lastedId = registro::select('idregistro')->orderBy('idregistro','des')->first();
            if($lastedId == null){
                $lastedId = 1;
            }else{
            $lastedId=$lastedId->idregistro+1;}
            $folio ="07"."$request->Municipio"."$claveLocalidad"."$lastedId";
            $newRegister = new registro;
            $newRegister->folio = $folio;
            $newRegister->idmunicipio = $request->Municipio;
            $newRegister->idlocalidades = $request->Localidad;
            $newRegister->domicilio = $request->Direccion;
            $newRegister->f = new \DateTime();
            
            if($newRegister->save()){
                return response()->json([
                    'message' => 'Se guardó correctamente!'
                ]);
            }
                else {
                    return response()->json([
                        'message' => 'Hubo un errror!'
                    ]);
                }
        }
        else 
        abort(403,'Forbidden: Lo sentimos, usted no tiene permisos para usar esto');
    }
}
