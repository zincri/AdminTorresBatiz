<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Post;

class AdminPromocionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index(){
        $promociones = DB::table('tbl_promociones')
        ->where('activo','=',1)
        ->get();
        return view("content.promociones.index",["promociones"=>$promociones]);
    }
    public function create(){
        $productos = DB::table('tbl_producto')
        ->select('tbl_producto.id',
                 'tbl_producto.nombre')
        ->where('activo','=',1)
        ->get();
        return view('content.promociones.create',['productos'=>$productos]);
    }
    public function edit($id){
        dd($id);
    }
    public function show($id){
        $productos= DB::table('tbl_producto')
        ->where('activo','=',1)
        ->where('tbl_producto.idpromocion','=',$id)
        ->get();
        $nombrePromocion = DB::table('tbl_promociones')
        ->select('tbl_promociones.Nombre as nombre')
        ->where('activo','=',1)
        ->where('tbl_promociones.id','=',$id)
        ->first();
        return view('content.promociones.show',["productos"=>$productos, "nombrePromocion"=>$nombrePromocion]);    
    }

    public function store(Request $request){
        if($request->ajax()) {
            // dd($request->all());
            // dd($productosAsociados[1]['nombreProducto']);
            // dd($request->get('productosAsociados'));
            
            $opcion = 1;
            $nombrePromocion = $request->get('nombrePromocion');
            $path= Storage::disk('public')->put('imageupload/promociones', $request->file('file'));
            $imagen=asset($path);
            $usuario=Auth::user()->id;
            $productosAsociados = $request->get('productosAsociados');
            $sql_sol = "call sp_CRUD_Promociones
            (
                '".$opcion."',
                '".$nombrePromocion."',
                '".$imagen."',
                '".$usuario."',
                '1'
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/promociones')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/promociones');
        }
    }
}
