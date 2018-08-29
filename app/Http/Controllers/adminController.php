<?php

namespace App\Http\Controllers;
use DB;
use App\userlevels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\avisos_informativos;

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

    public function store_notifications(Request $request) {
        $newAviso = new avisos_informativos;
        $newAviso->descripcion_aviso = $request->descripcion_aviso;
        if($newAviso->save()){
            return response()->json([
                'message'=>'saved!'
            ]);
        }else{
            return response()->json([
                'message' => 'failed to save'
            ]);
        }
        
    }

    public function Notifications(){
        $alerts = avisos_informativos::select('idavisos','descripcion_aviso')->orderBy('idavisos','desc')->first();
        $alerts = $alerts->descripcion_aviso;
        return response()->json([
            'message' => $alerts,
            'messageServer' => 'Mensaje del Administrador'
        ],200);
    }
}
