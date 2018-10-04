<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Post;

class AdminASCController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $info = DB::table('tbl_infoasc')
        ->where('activo','=',1)
        ->get();

        return view("content.infoASC.index",['info'=>$info]);
    }
    public function edit($id){
        $info = DB::table('tbl_infoasc')
        ->where('activo','=',1)
        ->where('id','=',$id)
        ->first();
        return view("content.infoASC.edit",['info'=>$info]);
    }
    public function update(Request $request, $id){
        if($request->file('file')){
            $this->validate(request(),[
                'file'=>'required|mimes:jpg,jpeg,png|max:1000'
            ]);
            $opcion=1;
            $titulo=$request->get('tituloInfo');
            $descripcion=$request->get('descInfo');
            $usuario=Auth::user()->id;
            /*OBTENER IMAGEN ANTERIOR*/ 
            $datos = DB::table('tbl_infoasc')->where('id','=',$id)->where('activo','=',1)->first();
            /*ELIMINAR LA IMAGEN ANTERIOR*/
            
            //if(Storage::disk('public')->exists($datos->imagen)){
            //    $dele= Storage::disk('public')->delete($datos->imagen);
            //}
            $cadena=substr($datos->imagen, 22,strlen ($datos->imagen));   
            if(Storage::disk('public')->exists($cadena)){
                $dele= Storage::disk('public')->delete($cadena);
            }

            $path= Storage::disk('public')->put('imageupload/infoASC', $request->file('file'));
            $imagen=asset($path);
            $sql_sol = "call sp_CRUD_infoASC
            (
                '".$opcion."',
                '".$titulo."',
                '".$descripcion."',
                '".$imagen."',
                '".$usuario."',
                '".$id."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/infoASC')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/infoASC');
            
        }
        else{
            $opcion=2;
            $titulo=$request->get('tituloInfo');
            $descripcion=$request->get('descInfo');
            $usuario=Auth::user()->id;
            $path="no importa";
            $sql_sol = "call sp_CRUD_infoASC
            (
                '".$opcion."',
                '".$titulo."',
                '".$descripcion."',
                '".$path."',
                '".$usuario."',
                '".$id."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/infoASC')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/infoASC');

        }
    }
}
