<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Post;

class GaleriaController extends Controller
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

    public function galeria($id)
    {
        //
        //$this->idparameter=$id;
        \Session::put('idparameter',$id);
        return Redirect::to('administrador/galeria');
    }

    public function index()
    {
        
        if(!\Session::has('idparameter')){
            return Redirect::to('administrador/productos')->withErrors(['erroregistro'=> 'Error']);
        }
        $id=\Session::get('idparameter');
        $datos = DB::table('tbl_galeria')->where('idproducto','=',$id)->where('activo','=',1)->get();
        if($datos==null){
            return Redirect::to('administrador/slider')->withErrors(['erroregistro'=> 'Error']);
        }
        return view('content.galeria.index',['datos'=>$datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.galeria.create');
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
            'file'=>'required|mimes:jpg,jpeg,png|max:1000'
        ]);
        
        if(!\Session::has('idparameter')){
            return Redirect::to('administrador/productos')->withErrors(['erroregistro'=> 'Error']);
        }
        
        
        if($request->file('file')){
            $path= Storage::disk('public')->put('imageupload/galeria', $request->file('file'));
            $imagen=asset($path);
            $opcion=1;
            $usuario=Auth::user()->id;
            $id=\Session::get('idparameter');
            $sql_sol = "call sp_CRUD_Imagenes
            (
                '".$opcion."',
                '".$imagen."',
                '".$usuario."',
                '".$id."'
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/galeria')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/galeria');

        }
        else{
            return Redirect::to('administrador/galeria')->withErrors(['erroregistro'=> 'Error']);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $opcion=2;
        $usuario=Auth::user()->id;
        $imagen="no importa";
        $idimagen=$id;
        $sql_sol = "call sp_CRUD_Imagenes
            (
                '".$opcion."',
                '".$imagen."',
                '".$usuario."',
                '".$idimagen."'
            )";
        $datos = DB::select($sql_sol,array(1,10));
        //recupero de la base de datos para eliminar en fisico!
        
        if($datos==null){
            return Redirect::to('administrador/galeria')->withErrors(['erroregistro'=> 'Error']);
        }
        $cadena=substr($datos[0]->imagen, 22,strlen ($datos[0]->imagen));   
        if(Storage::disk('public')->exists($cadena)){
            $dele= Storage::disk('public')->delete($cadena);
        }
        return Redirect::to('administrador/galeria');
    
    }
}
