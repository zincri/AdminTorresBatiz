<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informaciongeneral = DB::table('tbl_informaciongeneral')->first();
        $sucursales = DB::table('tbl_sucursal')->where('activo','=',1)->get();
        $servicios = DB::table('tbl_serviciosinformacion')->where('activo','=',1)->get();
        $redes = DB::table('tbl_catredessociales')->where('activo','=',1)->limit(5)->get();
        $marcas = DB::table('tbl_catmarcas')->where('activo','=',1)->get();
        $serviciosprincipal = DB::table('tbl_nuestrosservicios')->where('activo','=',1)->get();
        $proyectosrealizados = DB::table('tbl_proyectosrealizados')->where('activo','=',1)->get();
        $videos = DB::table('tbl_catvideos')->where('activo','=',1)->get();
        $slider = DB::table('tbl_slider')->where('activo','=',1)->get();
        
        session()->put('informacion', $informaciongeneral);
        session()->put('sucursales', $sucursales);
        session()->put('servicios', $servicios);
        session()->put('redes', $redes);
        
        
        
        return view('principal.navbar.inicio',["informaciongeneral"=>$informaciongeneral,
                                     "marcas"=>$marcas,
                                     "serviciosprincipal"=>$serviciosprincipal,
                                     "proyectosrealizados"=>$proyectosrealizados,
                                     "videos"=>$videos,
                                     "slider"=>$slider]);
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
