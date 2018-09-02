<?php

namespace App\Http\Controllers;
use DB;
use App\registro;
use App\userlevels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\avisos_informativos;
use App\tbl_documentos;

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

    public function ListFiles() {
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
                'message'=>'saved!'
            ]);
        }else{
            return response()->json([
                'message' => 'failed to save'
            ]);
        }
        
    }
    public function DownloadGuide($filename){
        $pathToFile = public_path().'/storage/'.$filename;
        // dd($pathToFile);
        return response()->download($pathToFile);
    }

    public function DeleteGuide($idfile, $filename) {
        $file_path = public_path().'/storage/'.$filename;
        if(file_exists($file_path)){
            \File::delete($file_path);
            if(tbl_documentos::where('id_documento','=',"$idfile")->delete()){
            return response()->json([
                'message'=>'Erased file!'
            ]);
            }
        }else{
            dd('El archivo no existe.');
          }
        
        return back()->withInput();
    
    }
}
