<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Post;

class AdminNoticiasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $noticias = DB::table('tbl_noticias')
        ->where('activo','=',1)
        ->get();

        return view("content.noticias.index",['noticias'=>$noticias]);
    }   
    public function create(){
        return view("content.noticias.create");
    }
    public function edit($id){
        $noticia = DB::table('tbl_noticias')
        ->where('id','=',$id)
        ->where('activo','=',1)
        ->first();

        return view("content.noticias.edit",['noticia'=>$noticia]);
    }
    public function store(Request $request){
        if($request->file('file')){
            $opcion=1;
            $nombreNoticia=$request->get('nombreNoticia');
            $descNoticia = $request->get('descNoticia');
            $usuario=Auth::user()->id;
            $path= Storage::disk('public')->put('imageupload/noticias', $request->file('file'));
            $imagen=asset($path);
            $sql_sol = "call sp_CRUD_Noticias
            (
                '".$opcion."',
                '".$nombreNoticia."',
                '".$descNoticia."',
                '".$imagen."',
                '".$usuario."',
                '1'
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/noticias')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/noticias');
        }
        else{
            //regresar a la pagina de noticias con error de que no se registro
            return Redirect::to('administrador/noticias')->withErrors(['erroregistro'=> 'Error']);
        }
    }
    public function update(Request $request, $id){
        if($request->file('file')){
            $this->validate(request(),[
                'file'=>'required|mimes:jpg,jpeg,png|max:1000'
            ]);
            $opcion=2;
            $nombreNoticia=$request->get('nombreNoticia');
            $descNoticia=$request->get('descNoticia');
            $usuario=Auth::user()->id;
            /*OBTENER IMAGEN ANTERIOR*/ 
            $datos = DB::table('tbl_noticias')->where('id','=',$id)->where('activo','=',1)->first();
            /*ELIMINAR LA IMAGEN ANTERIOR*/
            
            //if(Storage::disk('public')->exists($datos->imagen)){
            //    $dele= Storage::disk('public')->delete($datos->imagen);
            //}
            $cadena=substr($datos->imagen, 22,strlen ($datos->imagen));   
            if(Storage::disk('public')->exists($cadena)){
                $dele= Storage::disk('public')->delete($cadena);
            }

            $path= Storage::disk('public')->put('imageupload/noticias', $request->file('file'));
            $imagen=asset($path);
            $sql_sol = "call sp_CRUD_Noticias
            (
                '".$opcion."',
                '".$nombreNoticia."',
                '".$descNoticia."',
                '".$imagen."',
                '".$usuario."',
                '".$id."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/noticias')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/noticias');
            
        }
        else{
            $opcion=3;
            $nombreNoticia=$request->get('nombreNoticia');
            $descNoticia=$request->get('descNoticia');
            $usuario=Auth::user()->id;
            $path="no importa";
            $sql_sol = "call sp_CRUD_Noticias
            (
                '".$opcion."',
                '".$nombreNoticia."',
                '".$descNoticia."',
                '".$path."',
                '".$usuario."',
                '".$id."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/noticias')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/noticias');

        }

    }
    public function destroy($id){
        $opcion=4;
        $nombreNoticia="no importa";
        $descNoticia="no importa";
        $usuario=Auth::user()->id;
        $path="no importa";

        $sql_sol = "call sp_CRUD_Noticias
        (
            '".$opcion."',
            '".$nombreNoticia."',
            '".$descNoticia."',
            '".$path."',
            '".$usuario."',
            '".$id."'
            
        )";
        $datos = DB::select($sql_sol,array(1,10));
        if($datos==null){
            return Redirect::to('administrador/noticias')->withErrors(['erroregistro'=> 'Error']);
        }
        return Redirect::to('administrador/noticias');

    }
}


