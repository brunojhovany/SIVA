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
use App\tbl_documentos;

class adminController extends Controller
{
    public function Index(){
        $levelUSR = Auth::user()->profile;
        $lv = userlevels::findOrFail($levelUSR);
        if (Auth::user()->profile == 1){
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
        if (Auth::user()->profile == 1){
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
        Auth::user()->profile == 1?'ok':abort(403,'Forbidden');

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
        Auth::user()->profile == 1?'ok':abort(403,'Forbidden');
        $user = new User;
        $user = $user->UsersDescription($request);
        $usrlevels = userlevels::all();
        $jurisdicciones = jurisdiccion::all();
        return view('modals.admonusermodal',compact('user','usrlevels','jurisdicciones'))->render();
    }

    public function UpdateUsers (Request $request){
        Auth::user()->profile == 1?'ok':abort(403,'Forbidden');
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
        Auth::user()->profile == 1?'ok':abort(403,'Forbidden');

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
        Auth::user()->profile == 1?'ok':abort(403,'Forbidden');
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
        Auth::user()->profile == 1?'ok':abort(403,'Forbidden');
        $levelUSR = Auth::user()->profile;
        $lv = userlevels::findOrFail($levelUSR);
        $newFile = tbl_documentos::orderBy('nombre_archivo','asc')->get();
        if (Auth::user()->profile  == 1){
            return view('configuracion.guides',[
                'level' => $lv,
                'newFiles' => $newFile
            ]);
        }
        else 
        abort(403,'Forbidden');
    }
    public function AdmonRegister(){
        Auth::user()->profile == 1?'ok':abort(403,'Forbidden');
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
        Auth::user()->profile == 1?'ok':abort(403,'Forbidden');
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

    public function ListFiles() {
        Auth::user()->profile == 1?'ok':abort(403,'Forbidden');
        $levelUSR = Auth::user()->profile;
        $lv = userlevels::findOrFail($levelUSR);
        $newFile = tbl_documentos::orderBy('nombre_archivo','asc')->get();
        if (Auth::user()->profile  == (1 || 2 || 3)){
            return view('configuracion.show_manual',[
                'level' => $lv,
                'newFiles' => $newFile
            ]);
        }
        else 
        abort(403,'Forbidden');
    }

    public function Upfiles() {
        Auth::user()->profile == 1?'ok':abort(403,'Forbidden');
        //$newFile = new tbl_documentos;
        $levelUSR = Auth::user()->profile;
        $lv = userlevels::findOrFail($levelUSR);
        if (Auth::user()->profile  == 1){
            return view('configuracion.up_file_register',[
                'level' => $lv
            ]);
        }
        else 
        abort(403,'Forbidden');
    }

    public function store_files(Request $request) {
        Auth::user()->profile ==1?:abort(403, 'Permiso denegado');
        if($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/storage/', $name);
        }
        $newFile = new tbl_documentos;
        $newFile->titulo = $request->titulo;
        $newFile->descripcion = $request->descripcion;
        $newFile->nombre_archivo = $name;
        if($newFile->save()){
            return response()->json([
                'message'=>'El archivo se ha guardado correctamente!'
            ]);
        }else{
            return response()->json([
                'message' => 'El archivo no se ha podido guardar!'
            ]);
        }
    }


    public function store_notifications(Request $request) {
        Auth::user()->profile == 1?'ok':abort(403,'Forbidden');
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
    public function DownloadGuide($filename){
        Auth::user()->profile == 1?'ok':abort(403,'Forbidden');
        $pathToFile = public_path().'/storage/'.$filename;
        // dd($pathToFile);
        return response()->download($pathToFile);
    }

    public function DeleteGuide($idfile, $filename) {
        Auth::user()->profile == 1?'ok':abort(403,'Forbidden');
        $file_path = public_path().'/storage/'.$filename;
        if(file_exists($file_path)){
            \File::delete($file_path);
            if(tbl_documentos::where('id_documento','=',"$idfile")->delete()){
            return response()->json([
                'message'=>'El archivo se ha borrado correctamente!'
            ]);
            }
        }else{
            dd('El archivo no existe.');
          }
        
        //return back()->withInput();
        
    
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
