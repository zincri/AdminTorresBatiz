<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SolicitudArrendamientoRequest;
use DB;

class ArrendamientoController extends Controller
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
        return view('principal.navbar.arrendamiento',["informaciongeneral"=>$informaciongeneral,
                                            "marcas"=>$marcas,
                                            "videos"=>$videos]);
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
    public function store(SolicitudArrendamientoRequest $request)
    {
        //
        $opcion=1;
        $nombre=$request->get('nombre');
        $nombreempresa=$request->get('nombreempresa');
        if(empty($nombreempresa)){
            $nombreempresa='Sin empresa';
        }
        $telefono=$request->get('telefono');
        $email=$request->get('email');
        $blanconegro=$request->get('fotocopiadora');
        if($blanconegro === "on"){
            $blanconegro=1;
        }else{
            $blanconegro=0;
        }
        $color=$request->get('Impresora');
        if($color === "on"){
            $color=1;
        }else{
            $color=0;
        }
        $volumen=$request->get('volumen');
        $mensaje=$request->get('mensaje');
        $modelo="ninguno";
        $usuario=2;
        
        
        
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
            
            return Redirect::to('/arrendamiento');
        }
        else
        {
            return "Problemas en base de datos";
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
