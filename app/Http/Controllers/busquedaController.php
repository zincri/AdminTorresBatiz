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
    public function index()
    {

        if(!\Session::has('busqueda')){
            return Redirect::back();
        }
        $busqueda=\Session::get('busqueda');
        
            $informaciongeneral = DB::table('tbl_informaciongeneral')->first();
            $marcas = DB::table('tbl_catmarcas')->where('activo','=',1)->get();
            $videos = DB::table('tbl_catvideos')->where('activo','=',1)->get();
            $video=$videos->first();
            $noticia = DB::table('tbl_noticias')->where('activo','=',1)->orderBy('fecha_ins','desc')->first();
            $categorias= DB::table('tbl_categoriaproducto')->where('activo','=',1)
                        ->where('nombre','like','%'.$busqueda.'%')->get();
            
            $productos= DB::table('tbl_producto')->where('activo','=',1)
                        ->where('descripcioncorta','like','%'.$busqueda.'%')
                        ->orWhere('descripcionlarga', 'like','%'.$busqueda.'%')->get();
            
            return view('principal.navbar.busqueda',["informaciongeneral"=>$informaciongeneral,
                                                "marcas"=>$marcas,
                                              "videos"=>$videos,
                                              "video"=>$video,
                                              "noticia"=>$noticia,
                                              "categorias"=>$categorias,
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
        $credentials=$this->validate(request(),[
            'busqueda' => 'required|string|max:100'
        ]);

        \Session::put('busqueda',$request->get('busqueda'));
        return Redirect::to('/busqueda');

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
