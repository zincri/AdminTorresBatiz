<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Post;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos = DB::table('tbl_slider')->where('activo','=',1)->get();
        
        return view('content.slider.index',['datos' => $datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('content.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $credentials=$this->validate(request(),[
            'titulo' => 'required|string|max:99',
            'tituloglobo' => 'required|string|max:99',
            'file'=>'required|mimes:jpg,jpeg,png|max:1000'
        ]);
        if($request->file('file')){
            $path= Storage::disk('public')->put('imageupload/slider', $request->file('file'));
            $imagen=asset($path);
            $opcion=1;
            $titulo=$request->get('titulo');
            $tituloglobo=$request->get('tituloglobo');
            $usuario=Auth::user()->id;

            $sql_sol = "call sp_CRUD_slider
            (
                '".$opcion."',
                '".$imagen."',
                '".$titulo."',
                '".$tituloglobo."',
                '".$usuario."',
                '1'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/slider')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/slider');

        }
        else {
            //regresar a la pagina de slider con error de que no se registro
            return Redirect::to('administrador/slider')->withErrors(['erroregistro'=> 'Error']);
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $datos = DB::table('tbl_slider')->where('id','=',$id)->where('activo','=',1)->first();
        if($datos==null){
            return Redirect::to('administrador/slider')->withErrors(['erroregistro'=> 'Error']);
        }
        return view('content.slider.edit',['datos'=>$datos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $credentials=$this->validate(request(),[
            'titulo' => 'required|string|max:99',
            'tituloglobo' => 'required|string|max:99'
        ]);
        if($request->file('file')){
            
            $credentials=$this->validate(request(),[
                'file'=>'required|mimes:jpg,jpeg,png|max:1000'
            ]);

            $path= Storage::disk('public')->put('imageupload/slider', $request->file('file'));
            $imagen=asset($path);
            $opcion=2;
            $titulo=$request->get('titulo');
            $tituloglobo=$request->get('tituloglobo');
            $usuario=Auth::user()->id;
            /*OBTENER IMAGEN ANTERIOR*/ 
            $datos = DB::table('tbl_slider')->where('id','=',$id)->where('activo','=',1)->first();
            /*ELIMINAR LA IMAGEN ANTERIOR*/
            //if(Storage::disk('public')->exists($datos->imagen)){
            //    $dele= Storage::disk('public')->delete($datos->imagen);
            //}
            $cadena=substr($datos->imagen, 22,strlen ($datos->imagen));   
            if(Storage::disk('public')->exists($cadena)){
                $dele= Storage::disk('public')->delete($cadena);
            }

            $sql_sol = "call sp_CRUD_slider
            (
                '".$opcion."',
                '".$imagen."',
                '".$titulo."',
                '".$tituloglobo."',
                '".$usuario."',
                '".$id."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/slider')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/slider');

        }
        else {
            //regresar a la pagina de slider 
            $opcion=3;
            $titulo=$request->get('titulo');
            $tituloglobo=$request->get('tituloglobo');
            $usuario=Auth::user()->id;
            $path="no importa";
            $sql_sol = "call sp_CRUD_slider
            (
                '".$opcion."',
                '".$path."',
                '".$titulo."',
                '".$tituloglobo."',
                '".$usuario."',
                '".$id."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/slider')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/slider');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
            
            $opcion=4;
            $titulo="No importa";
            $tituloglobo="No importa";
            $usuario=Auth::user()->id;
            $path="no importa";

            $sql_sol = "call sp_CRUD_slider
            (
                '".$opcion."',
                '".$path."',
                '".$titulo."',
                '".$tituloglobo."',
                '".$usuario."',
                '".$id."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            /*ELIMINAR LA IMAGEN ANTERIOR*/
            //if(Storage::disk('public')->exists($datos[0]->imagen)){
            //    $dele= Storage::disk('public')->delete($datos[0]->imagen);
            //}
            $cadena=substr($datos[0]->imagen, 22,strlen ($datos[0]->imagen));   
            if(Storage::disk('public')->exists($cadena)){
                $dele= Storage::disk('public')->delete($cadena);
            }
            
            if($datos==null){
                return Redirect::to('administrador/slider')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/slider');
    }
}
