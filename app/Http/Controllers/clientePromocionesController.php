<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Post;

class clientePromocionesController extends Controller
{
    public function index($id){
        $promocion = DB::table('tbl_promociones')
        ->where('activo','=',1)
        ->where('id','=',$id)
        ->get();
  
        $datos = DB::table('tbl_producto')
        ->select('tbl_producto.imagen',
                 'tbl_producto.id',
                 'tbl_producto.nombre',
                 'tbl_promoproductos.cantidad')
        ->where('tbl_promoproductos.activo','=',1)
        ->where('tbl_promoproductos.id_promocion','=',$id)
        ->join('tbl_promoproductos','tbl_producto.id','=','tbl_promoproductos.id_producto')
        ->get();

        $informaciongeneral = DB::table('tbl_informaciongeneral')->first();
        $marcas = DB::table('tbl_catmarcas')->where('activo','=',1)->get();
        $videos = DB::table('tbl_catvideos')->where('activo','=',1)->get();
        $galeria = DB::table('tbl_galeria')->where('activo','=',1)->where('idproducto','=',$id)->get();
        
        
        return view('principal.navbar.promociones',["informaciongeneral"=>$informaciongeneral,
                                                "marcas"=>$marcas,
                                                "videos"=>$videos,
                                                "galeria"=>$galeria,
                                                'promocion'=>$promocion,
                                                'datos'=>$datos]);
    }
}
