<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SolicitudConsumiblesRequest;
use DB;

class ConsumiblesController extends Controller
{
    public function __construct()
    {
        $informaciongeneral = DB::table('tbl_informaciongeneral')->first();
        $sucursales = DB::table('tbl_sucursal')->where('activo','=',1)->get();
        $servicios = DB::table('tbl_serviciosinformacion')->where('activo','=',1)->get();
        $redes = DB::table('tbl_catredessociales')->where('activo','=',1)->limit(5)->get();
        
        session()->put('informacion', $informaciongeneral);
        session()->put('sucursales', $sucursales);
        session()->put('servicios', $servicios);
        session()->put('redes', $redes);
    }
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
        $video=$videos->first();
        $noticia = DB::table('tbl_noticias')->where('activo','=',1)->orderBy('fecha_ins','desc')->first();
        $info = DB::table('tbl_infoasc')
        ->where('pagina','=','consumibles')
        ->where('activo','=',1)
        ->first();
        
        if($noticia == null){
            return view('principal.navbar.consumibles',["informaciongeneral"=>$informaciongeneral,
                                            "marcas"=>$marcas,
                                          "videos"=>$videos,
                                          "video"=>$video,
                                          "noticia"=>"No hay noticias recientes",
                                          "info"=>$info]);
        }
        else{
            return view('principal.navbar.consumibles',["informaciongeneral"=>$informaciongeneral,
                                            "marcas"=>$marcas,
                                          "videos"=>$videos,
                                          "video"=>$video,
                                          "noticia"=>$noticia->descripcion,
                                          "info"=>$info]);
        }
        
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
    public function store(SolicitudConsumiblesRequest $request)
    {
        $opcion=2;
        $nombre=$request->get('nombre');
        $nombreempresa=$request->get('empresa');
        if(empty($nombreempresa)){
            $nombreempresa='Sin empresa';
        }
        $telefono=$request->get('telefono');
        $email=$request->get('email');
        $mensaje=$request->get('mensaje');
        $modelo=$request->get('modelo');
        $usuario=2;
        
        /*
        No necesarios*/

        $blanconegro=1;
        $color=1;
        $volumen=1;
        /**/
        
        
        $sql_solicitud = "call sp_setSolicitud
        (
            '".$opcion."',
            '".$nombre."',
            '".$nombreempresa."',
            '".$telefono."',
            '".$email."',
            '".$blanconegro."',
            '".$color."',
            '".$volumen."',
            '".$mensaje."',
            '".$modelo."',
            '".$usuario."'
            
        )";
        $datos_solicitud = DB::select($sql_solicitud,array(1,10));

        if($datos_solicitud != null)
        {
            return Redirect::to('/consumibles')->with("success","Hemos recibido su solicitud. Nos comunicaremos con usted en su brevedad.");
        }
        else
        {
            return Redirect::to('/consumibles')->with("error","Ha ocurrido un error al enviar su formulario. Inténtelo más tarde.");
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
        //
    }
}
