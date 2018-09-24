<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Post;

class AdminProyectosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $proyectos = DB::table('tbl_proyectosrealizados')
        ->where('activo','=',1)
        ->get();

        return view("content.proyectos.index",['proyectos'=>$proyectos]);
    }
    public function create(){
        return view("content.proyectos.create");
    }
    public function edit($id){
        $proyecto = DB::table('tbl_proyectosrealizados')
        ->where('id','=',$id)
        ->where('activo','=',1)
        ->first();

        return view("content.proyectos.edit",['proyecto'=>$proyecto]);
    }
    public function store(Request $request){
        if($request->file('file')){
            $opcion=1;
            $tituloProyecto=$request->get('tituloProyecto');
            $descProyecto = $request->get('descProyecto');
            $usuario=Auth::user()->id;
            $path= Storage::disk('public')->put('imageupload/proyectos', $request->file('file'));
            $imagen=asset($path);
            $sql_sol = "call sp_CRUD_Proyectos
            (
                '".$opcion."',
                '".$tituloProyecto."',
                '".$descProyecto."',
                '".$imagen."',
                '".$usuario."',
                '1'
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/proyectos')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/proyectos');
        }
        else{
            //regresar a la pagina de proyectos con error de que no se registro
            return Redirect::to('administrador/proyectos')->withErrors(['erroregistro'=> 'Error']);
        }
    }
    public function update(Request $request, $id){
        if($request->file('file')){
            $this->validate(request(),[
                'file'=>'required|mimes:jpg,jpeg,png|max:1000'
            ]);
            $opcion=2;
            $tituloProyecto=$request->get('tituloProyecto');
            $descProyecto=$request->get('descProyecto');
            $usuario=Auth::user()->id;
            /*OBTENER IMAGEN ANTERIOR*/ 
            $datos = DB::table('tbl_proyectosrealizados')->where('id','=',$id)->where('activo','=',1)->first();
            /*ELIMINAR LA IMAGEN ANTERIOR*/
            
            //if(Storage::disk('public')->exists($datos->imagen)){
            //    $dele= Storage::disk('public')->delete($datos->imagen);
            //}
            $cadena=substr($datos->imagen, 22,strlen ($datos->imagen));   
            if(Storage::disk('public')->exists($cadena)){
                $dele= Storage::disk('public')->delete($cadena);
            }

            $path= Storage::disk('public')->put('imageupload/proyectos', $request->file('file'));
            $imagen=asset($path);
            $sql_sol = "call sp_CRUD_Proyectos
            (
                '".$opcion."',
                '".$tituloProyecto."',
                '".$descProyecto."',
                '".$imagen."',
                '".$usuario."',
                '".$id."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/proyectos')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/proyectos');
            
        }
        else{
            $opcion=3;
            $tituloProyecto=$request->get('tituloProyecto');
            $descProyecto=$request->get('descProyecto');
            $usuario=Auth::user()->id;
            $path="no importa";
            $sql_sol = "call sp_CRUD_Proyectos
            (
                '".$opcion."',
                '".$tituloProyecto."',
                '".$descProyecto."',
                '".$path."',
                '".$usuario."',
                '".$id."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/proyectos')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/proyectos');

        }
    }
    public function destroy($id){
        $opcion=4;
        $tituloProyecto="no importa";
        $descProyecto="no importa";
        $usuario=Auth::user()->id;
        $path="no importa";

        $sql_sol = "call sp_CRUD_Proyectos
        (
            '".$opcion."',
            '".$tituloProyecto."',
            '".$descProyecto."',
            '".$path."',
            '".$usuario."',
            '".$id."'
            
        )";
        $datos = DB::select($sql_sol,array(1,10));
        if($datos==null){
            return Redirect::to('administrador/proyectos')->withErrors(['erroregistro'=> 'Error']);
        }
        return Redirect::to('administrador/proyectos');
    }
}
