<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProductosTodosController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informaciongeneral = DB::table('tbl_informaciongeneral')->first();
        $marcas = DB::table('tbl_catmarcas')->where('activo','=',1)->get();
        $videos = DB::table('tbl_catvideos')->where('activo','=',1)->get();
        
        return view('principal.navbar.productostodos',["informaciongeneral"=>$informaciongeneral,
                                                "marcas"=>$marcas,
                                                "videos"=>$videos]);
    }

    public function showProducts($categoria){
        if($categoria == 1){
            $productosByCategoria = DB::table('tbl_producto')->where('activo',"=",1)->paginate(16);
        }
        else{
            $productosByCategoria = DB::table('tbl_producto')->where('idcategoriaproducto',"=",$categoria)->where('activo','=',1)->paginate(16);
        }
        $informaciongeneral = DB::table('tbl_informaciongeneral')->first();
        $marcas = DB::table('tbl_catmarcas')->where('activo','=',1)->get();
        $videos = DB::table('tbl_catvideos')->where('activo','=',1)->get();
        return view('principal.navbar.productostodos',["informaciongeneral"=>$informaciongeneral,
                                                "marcas"=>$marcas,
                                                "videos"=>$videos,
                                                "productos"=>$productosByCategoria]);

        
        // index($productosByCategoria);
        
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
    public function show($categoria)
    {
        $informaciongeneral = DB::table('tbl_informaciongeneral')->first();
        $marcas = DB::table('tbl_catmarcas')->where('activo','=',1)->get();
        $videos = DB::table('tbl_catvideos')->where('activo','=',1)->get();
        
        return view('principal.navbar.productostodos',["informaciongeneral"=>$informaciongeneral,
                                                "marcas"=>$marcas,
                                                "videos"=>$videos,
                                                "productos"=>$categoria]);
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
