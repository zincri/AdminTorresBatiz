<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Post;
class AdminMarcasController extends Controller
{
    public function index(){
        $marcas = DB::table('tbl_catmarcas')
        ->where('activo','=',1)
        ->get();

        return view("content.marcas.index",['marcas'=>$marcas]);
    }
    public function create(){
        
        return view("content.marcas.create");
    }
    public function store(Request $request){
        if($request->file('file')){
            $opcion=1;
            $nombreMarca=$request->get('nombreMarca');
            $usuario=Auth::user()->id;
            $path= Storage::disk('public')->put('imageupload/marcas', $request->file('file'));
            $imagen=asset($path);
            $sql_sol = "call sp_CRUD_Marcas
            (
                '".$opcion."',
                '".$nombreMarca."',
                '".$imagen."',
                '".$usuario."',
                '1'
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/marcas')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/marcas');
        }
        else{
            //regresar a la pagina de productos con error de que no se registro
            return Redirect::to('administrador/marcas')->withErrors(['erroregistro'=> 'Error']);
        }
    }
    public function destroy($id){
        $opcion = 2;
        $nombreMarca="no importa";
        $usuario=Auth::user()->id;
        $path="no importa";

        $sql_sol = "call sp_CRUD_Marcas
        (
            '".$opcion."',
            '".$nombreMarca."',
            '".$path."',
            '".$usuario."',
            '".$id."'
        )";
        $datos = DB::select($sql_sol,array(1,10));
        if($datos==null){
            return Redirect::to('administrador/productos')->withErrors(['erroregistro'=> 'Error']);
        }
        return Redirect::to('administrador/productos');
    }
}
