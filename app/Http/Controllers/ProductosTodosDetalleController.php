<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductosTodosDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$categoria)
    {
        $productos = DB::table('tbl_producto')->where('activo','=',1)->where('idcategoriaproducto','=',$categoria)->limit(4)->get();
        $producto = DB::table('tbl_producto')->where('activo','=',1)->where('id','=',$id)->first();
        $informaciongeneral = DB::table('tbl_informaciongeneral')->first();
        $marcas = DB::table('tbl_catmarcas')->where('activo','=',1)->get();
        $videos = DB::table('tbl_catvideos')->where('activo','=',1)->get();
        $galeria = DB::table('tbl_galeria')->where('activo','=',1)->where('idproducto','=',$id)->get();
        
        return view('principal.navbar.productostodosdetalle',["informaciongeneral"=>$informaciongeneral,
                                                "marcas"=>$marcas,
                                                "videos"=>$videos,
                                                "producto"=>$producto,
                                                "galeria"=>$galeria,
                                                "productos"=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = DB::table('tbl_producto')->where('activo','=',1)->where('id','=',$id)->first();
        
        $getCategoria = $producto->idcategoriaproducto;
        $productos = DB::table('tbl_producto')->where('activo','=',1)->where('idcategoriaproducto','=',$getCategoria)->limit(4)->get();
        
        
        $informaciongeneral = DB::table('tbl_informaciongeneral')->first();
        $marcas = DB::table('tbl_catmarcas')->where('activo','=',1)->get();
        $videos = DB::table('tbl_catvideos')->where('activo','=',1)->get();
        $galeria = DB::table('tbl_galeria')->where('activo','=',1)->where('idproducto','=',$id)->get();
        
        return view('principal.navbar.productostodosdetalle',["informaciongeneral"=>$informaciongeneral,
                                                "marcas"=>$marcas,
                                                "videos"=>$videos,
                                                "producto"=>$producto,
                                                "galeria"=>$galeria,
                                                "productos"=>$productos]);
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
        //
    }
}
