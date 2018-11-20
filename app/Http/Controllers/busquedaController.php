<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class BusquedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      
        $busqueda = $request->get('busqueda');
            $informaciongeneral = DB::table('tbl_informaciongeneral')->first();
            $marcas = DB::table('tbl_catmarcas')->where('activo','=',1)->get();
            $videos = DB::table('tbl_catvideos')->where('activo','=',1)->get();
            $video=$videos->first();
            $noticia = DB::table('tbl_noticias')->where('activo','=',1)->orderBy('fecha_ins','desc')->first();
          
            $productos = DB::table('tbl_producto')
            ->select('tbl_producto.id as idProducto',
                     'tbl_producto.nombre as nombreProducto',
                     'tbl_producto.marca as marcaProducto',
                     'tbl_producto.descripcioncorta as descProducto',
                     'tbl_categoriaproducto.nombre as categoria')
            ->where(\DB::raw("CONCAT(tbl_producto.nombre, ' ' , tbl_producto.marca, ' ' , tbl_producto.descripcioncorta, ' ' , tbl_categoriaproducto.nombre)"), "LIKE", "%$busqueda%")
            ->where('tbl_producto.activo','=',1)
            ->join('tbl_categoriaproducto', 'tbl_producto.idcategoriaproducto', '=', 'tbl_categoriaproducto.id')
            ->get();
            
            return view('principal.navbar.busqueda',["informaciongeneral"=>$informaciongeneral,
                                                "marcas"=>$marcas,
                                              "videos"=>$videos,
                                              "video"=>$video,
                                              "noticia"=>$noticia,
                                              "productos"=>$productos
                                              ]);
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
        //
    }
}
