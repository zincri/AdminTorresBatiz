<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Post;

class busquedaController extends Controller
{
        public function index(){
            $informaciongeneral = DB::table('tbl_informaciongeneral')->first();
            $marcas = DB::table('tbl_catmarcas')->where('activo','=',1)->get();
            $videos = DB::table('tbl_catvideos')->where('activo','=',1)->get();
            $video=$videos->first();
            $noticia = DB::table('tbl_noticias')->where('activo','=',1)->orderBy('fecha_ins','desc')->first();
            
            return view('principal.navbar.busqueda',["informaciongeneral"=>$informaciongeneral,
                                                "marcas"=>$marcas,
                                              "videos"=>$videos,
                                              "video"=>$video,
                                              "noticia"=>$noticia]);
        
    }
    public function store(Request $request){
        
        if($request->all())
        {
            return Redirect::to('/busqueda');
        }
    }

}
