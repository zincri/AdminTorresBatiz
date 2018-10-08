<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ListaVideosController extends Controller
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
        $datos = DB::table('tbl_catvideos')->where('activo','=',1)->get();
        return view('content.videos.index',['datos'=>$datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.videos.create');
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
            'video' => 'required|string|max:100',
            'url' => 'required|string|max:200'
        ]);
        $nombre=$request->get('video');
        $url=$request->get('url');
        $urlresultado = str_replace("watch?v=", "embed/", $url);
        
        
        $usuario=Auth::user()->id;
        
        $datos=DB::table('tbl_catvideos')->insert(
            ['nombre' => $nombre,
             'video' => $urlresultado,
             'usuario_ins' => $usuario,
             'usuario_upd' => $usuario,
             'activo' => 1]
        );
        
        return Redirect::to('administrador/listavideos');
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
        $datos = DB::table('tbl_catvideos')
                    ->where('activo','=',1)
                    ->where('id','=',$id)->first();
                    if($datos==null){
                        return Redirect::to('administrador/listavideos')->withErrors(['erroregistro'=> 'Error']);
                    }
                    
        return view('content.videos.edit',['datos'=>$datos]);
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
            'video' => 'required|string|max:100',
            'url' => 'required|string|max:200'
        ]);
        $nombre=$request->get('video');
        $url=$request->get('url');
        $urlresultado=$url;
        $urlresultado = str_replace("watch?v=", "embed/", $url);    
        $usuario=Auth::user()->id;
        
        $datos=DB::table('tbl_catvideos')->where('id', $id)->update(
            [
             'usuario_upd' => $usuario,
             'nombre' => $nombre,
             'video' => $urlresultado,
             ]
        ); 
        

        return Redirect::to('administrador/listavideos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario=Auth::user()->id;
        
        $datos=DB::table('tbl_catvideos')->where('id', $id)->update(
            [
             'usuario_upd' => $usuario,
             'activo' => 0]
        ); 
        

        return Redirect::to('administrador/listavideos');
    }
}
