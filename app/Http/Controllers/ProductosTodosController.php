<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Post;
class ProductosTodosController extends Controller
{
    public function __construct()
    {
        if(session()->get('informacion')){
            $informaciongeneral = DB::table('tbl_informaciongeneral')->first();
            $sucursales = DB::table('tbl_sucursal')->where('activo','=',1)->get();
            $servicios = DB::table('tbl_serviciosinformacion')->where('activo','=',1)->get();
            $redes = DB::table('tbl_catredessociales')->where('activo','=',1)->limit(5)->get();
            
            session()->put('informacion', $informaciongeneral);
            session()->put('sucursales', $sucursales);
            session()->put('servicios', $servicios);
            session()->put('redes', $redes);
        }
        
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
        
        return view('principal.navbar.productostodos',["informaciongeneral"=>$informaciongeneral,
                                                "marcas"=>$marcas,
                                                "videos"=>$videos]);
    }

    public function showProducts($categoria){
        $idTemp = DB::table('tbl_categoriaproducto')->where('id',"=",$categoria)->where('activo','=',1)->get();

        
        if($idTemp[0]->nombre == "Todos los productos"){
            $productosByCategoria = DB::table('tbl_producto')->where('activo',"=",1)->paginate(16);
        }
        else if($idTemp[0]->nombre == "Arrendamiento" || $idTemp[0]->id == 4){
            return Redirect::to('/arrendamiento');
        }
        else if($idTemp[0]->nombre == "Consumibles y refacciones" || $idTemp[0]->id == 16){
            return Redirect::to('/consumibles');
        }
        else{
            $productosByCategoria = DB::table('tbl_producto')->where('idcategoriaproducto',"=",$categoria)->where('activo','=',1)->paginate(16);
        }
        $categoriaActual = DB::table('tbl_categoriaproducto')
        ->select('nombre')
        ->where('id','=',$categoria)
        ->first();
        $informaciongeneral = DB::table('tbl_informaciongeneral')->first();
        $marcas = DB::table('tbl_catmarcas')->where('activo','=',1)->get();
        $videos = DB::table('tbl_catvideos')->where('activo','=',1)->get();
        return view('principal.navbar.productostodos',["informaciongeneral"=>$informaciongeneral,
                                                "marcas"=>$marcas,
                                                "videos"=>$videos,
                                                "productos"=>$productosByCategoria,
                                                "categoriaActual"=>$categoriaActual->nombre]);

        
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
