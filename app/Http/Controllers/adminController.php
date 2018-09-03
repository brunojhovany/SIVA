<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\registro;
use App\userlevels;
use App\jurisdiccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        abort(403,'Forbidden: Acceso denegado para su tipo de usario');
    }
    public function AdmonUsers(Request $request){
        $usr = new User;
        $levelUSR = Auth::user()->profile;
        $lv = userlevels::findOrFail($levelUSR);
        if (Auth::user()->profile  == 1){
            return view('configuracion.admon_users',[
                'level' => $lv,
                'users' => $usr->UsersDescription($request)
            ]);
        }
        else 
        abort(403,'Forbidden');
    }

    public function NewUserForm(Request $request){
        $usrlevels = userlevels::all();
        $jurisdicciones = jurisdiccion::all();
        return view('modals.addusrmodal', compact('usrlevels', 'jurisdicciones'))->render();
    }
    public function NewUser (Request $request){
        $usr = new User;
        $usr->name = $request->Name;
        $usr->email = $request->Email;
        $usr->password = Hash::make($request->Password);
        $usr->profile = $request->UserTipe;
        $request->has('Jurisdiccion') && $request->UserTipe == 2 ? $usr->jurisdiccion = $request->Jurisdiccion:'';
        if($usr->save()){
            return response()->json([
                'message'=> 'Nuevo usuario guardado con éxíto'
            ]);
        }else{
                return response()->json([
                    'message'=> 'Nuevo usuario guardado con éxíto'
                ]);
            }
    }

    public function EditUserForm(Request $request){
        $user = new User;
        $user = $user->UsersDescription($request);
        $usrlevels = userlevels::all();
        $jurisdicciones = jurisdiccion::all();
        return view('modals.admonusermodal',compact('user','usrlevels','jurisdicciones'))->render();
    }

    public function UpdateUsers (Request $request){
        $userToUpdate = User::find($request->userId);
        $userToUpdate->name = $request->Name;
        $request->has('Password') && $request->Password? $userToUpdate->password = Hash::make($request->Password):'';
        $request->has('UserTipe')? $userToUpdate->profile = $request->UserTipe:'';
        $request->has('Jurisdiccion')? $userToUpdate->jurisdiccion = $request->Jurisdiccion :'';
        if($userToUpdate->save()){
            return response()->json([
                'message' => 'Usuario actualizado.'
            ]);
        }
        else{
            return response()->json([
                'message' => 'No hay nada que actualizar'
            ]);
        }
    }
    public function DeleteUsers(Request $request){
        if(User::find($request->idUser)->delete()){
            return response()->json([
                'message' => 'usurio elíminado'
            ]);
        }
        else{
            return response()->json([
                'message' => 'Ocurrió un error al eliminar al usuario'
            ]);
        }
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
