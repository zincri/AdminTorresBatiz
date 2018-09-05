<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ListaServiciosController extends Controller
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
        $datos = DB::table('tbl_serviciosinformacion')->where('activo','=',1)->get();
        return view('content.serviciosfooter.index',['datos'=>$datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('content.serviciosfooter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $credentials=$this->validate(request(),[
            'servicio' => 'required|string|max:99',
        ]);
        $servicio=$request->get('servicio');
        $usuario=Auth::user()->id;
        
        $datos=DB::table('tbl_serviciosinformacion')->insert(
            ['servicio' => $servicio,
             'usuario_ins' => $usuario,
             'usuario_upd' => $usuario,
             'activo' => 1]
        ); 
        
        return Redirect::to('administrador/listaservicios');
        
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

        //dd("entro a edit: ".$id);
        $datos = DB::table('tbl_serviciosinformacion')
                    ->where('activo','=',1)
                    ->where('id','=',$id)->first();
                    if($datos==null){
                        return Redirect::to('administrador/listaservicios')->withErrors(['erroregistro'=> 'Error']);
                    }
                    
        return view('content.serviciosfooter.edit',['datos'=>$datos]);
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
        $credentials=$this->validate(request(),[
            'servicio' => 'required|string|max:99',
        ]);

        $servicio=$request->get('servicio');
        $usuario=Auth::user()->id;
        
        $datos=DB::table('tbl_serviciosinformacion')->where('id', $id)->update(
            [
             'usuario_upd' => $usuario,
             'servicio' => $servicio]
        ); 
        

        return Redirect::to('administrador/listaservicios');
        
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
        
        $usuario=Auth::user()->id;
        
        $datos=DB::table('tbl_serviciosinformacion')->where('id', $id)->update(
            [
             'usuario_upd' => $usuario,
             'activo' => 0]
        ); 
        

        return Redirect::to('administrador/listaservicios');
        
        
    }
}
