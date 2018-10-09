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
        $promocion = DB::table('tbl_promociones')
        ->where('activo','=',1)
        ->where('id','=',$id)
        ->get();
        $productos = DB::table('tbl_producto')
        ->select('tbl_producto.id',
                 'tbl_producto.nombre')
        ->where('activo','=',1)
        ->get();
        $datos = DB::table('tbl_producto')
        ->select('tbl_producto.id as idProducto',
                 'tbl_producto.nombre as nombreProducto',
                 'tbl_promoproductos.cantidad as cantidadProducto')
        ->where('tbl_promoproductos.activo','=',1)
        ->where('tbl_promoproductos.id_promocion','=',$id)
        ->join('tbl_promoproductos','tbl_producto.id','=','tbl_promoproductos.id_producto')
        ->get();
        
        
        return view('content.promociones.edit',['promocion'=>$promocion,
                                                'datos'=>$datos,
                                                'productos'=>$productos]);
    }
    public function show($id){
        $promocion = DB::table('tbl_promociones')
        ->where('activo','=',1)
        ->where('id','=',$id)
        ->get();
  
        $datos = DB::table('tbl_producto')
        ->select('tbl_producto.imagen',
                 'tbl_producto.nombre',
                 'tbl_promoproductos.cantidad')
        ->where('tbl_promoproductos.activo','=',1)
        ->where('tbl_promoproductos.id_promocion','=',$id)
        ->join('tbl_promoproductos','tbl_producto.id','=','tbl_promoproductos.id_producto')
        ->get();
        
        
        return view('content.promociones.show',['promocion'=>$promocion,
                                                'datos'=>$datos]);
    }

    public function store(Request $request){
        // dd($request->all());
        if($request->all()) {
            // dd($request->all());
            // dd($productosAsociados[1]['nombreProducto']);
            // dd($request->get('productosAsociados'));
            
            $opcion = 1;
            $nombrePromocion = $request->get('nombrePromocion');
            $path= Storage::disk('public')->put('imageupload/promociones', $request->file('file'));
            $imagen=asset($path);
            $usuario=Auth::user()->id;
            $idProductos = $request->get('idProduct');
            $cantidades = $request->get('cantidad');
            $sql_sol = "call sp_CRUD_Promociones
            (
                '".$opcion."',
                '".$nombrePromocion."',
                '".$imagen."',
                '".$usuario."',
                '1'
            )";
            $datos = DB::select($sql_sol,array(1,10));
            $idPromo = DB::table('tbl_promociones')
            ->select('id')
            ->where('Nombre','=',$nombrePromocion)
            ->get();
            // dd($idPromo[0]->id);
            $getID = $idPromo[0]->id;
            for($i = 0; $i < count($idProductos); $i++){
                $sql_sol = "call sp_CRUD_promoProductos
            (
                '".$opcion."',
                '".$idProductos[$i]."',
                '".$getID."',
                '".$cantidades[$i]."',
                '".$usuario."'
            )";
            $datos = DB::select($sql_sol,array(1,10));
            }
            if($datos==null){
                return Redirect::to('administrador/promociones')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/promociones');
        }
    
    }

    public function update(Request $request, $id){
            
            if($request->file('file')){
            $opcion=2;
            $nombrePromocion = $request->get('nombrePromocion');
            
            /*OBTENER IMAGEN ANTERIOR*/ 
            $dto = DB::table('tbl_promociones')->where('id','=',$id)->where('activo','=',1)->first();
            /*ELIMINAR LA IMAGEN ANTERIOR*/
            $cadena=substr($dto->Imagen, 22,strlen ($dto->Imagen));   
            if(Storage::disk('public')->exists($cadena)){
                $dele= Storage::disk('public')->delete($cadena);
            }
            $path= Storage::disk('public')->put('imageupload/promociones', $request->file('file'));
            $imagen=asset($path);
            $usuario=Auth::user()->id;
            $idProductos = $request->get('idProduct');
            $cantidades = $request->get('cantidad');
            $sql_sol = "call sp_CRUD_Promociones
            (
                '".$opcion."',
                '".$nombrePromocion."',
                '".$imagen."',
                '".$usuario."',
                '".$id."'
            )";
            $datos = DB::select($sql_sol,array(1,10));

            }
            else{
                $opcion=3;
                $nombrePromocion = $request->get('nombrePromocion');
                
            $imagen="no importa";
            $usuario=Auth::user()->id;
            $idProductos = $request->get('idProduct');
            $cantidades = $request->get('cantidad');
            $sql_sol = "call sp_CRUD_Promociones
            (
                '".$opcion."',
                '".$nombrePromocion."',
                '".$imagen."',
                '".$usuario."',
                '".$id."'
            )";
            $datos = DB::select($sql_sol,array(1,10));
            }
           
            $usuario=Auth::user()->id;
            $idProductos = $request->get('idProduct');
            $cantidades = $request->get('cantidad');
            if($request->get('idProduct') == null){
                $opcionCat = 2;
                $sql_sol = "call sp_CRUD_promoProductos
            (
                '".$opcionCat."',
                '1',
                '".$id."',
                '1',
                '".$usuario."'
            )";
            $datos = DB::select($sql_sol,array(1,10));

            }
            else{
                
                $opcionCat1 = 3;
                $sql_sol = "call sp_CRUD_promoProductos
                (
                    '".$opcionCat1."',
                    '1',
                    '".$id."',
                    '1',
                    '".$usuario."'
                )";
                $datos = DB::select($sql_sol,array(1,10));
                
                $opcionCat = 4;
                for($i = 0; $i < count($idProductos); $i++){
                    $sql_sol = "call sp_CRUD_promoProductos
                (
                    '".$opcionCat."',
                    '".$idProductos[$i]."',
                    '".$id."',
                    '".$cantidades[$i]."',
                    '".$usuario."'
                )";
                $datos = DB::select($sql_sol,array(1,10));
                }
            }

            if($datos==null){
                return Redirect::to('administrador/promociones')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/promociones');
    }
    public function destroy($id){
        $opcion = 4;
            $usuario=Auth::user()->id;
            $sql_sol = "call sp_CRUD_Promociones
            (
                '".$opcion."',
                'no importa',
                'no importa',
                '".$usuario."',
                '".$id."'
            )";
            $datos = DB::select($sql_sol,array(1,10));

            $opcionCat = 5;

            $sql_sol = "call sp_CRUD_promoProductos
            (
                '".$opcionCat."',
                '1',
                '".$id."',
                '1',
                '".$usuario."'
            )";
            $datos = DB::select($sql_sol,array(1,10));

            if($datos==null){
                return Redirect::to('administrador/promociones')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/promociones');

        }

    
}


// TODO ES NUEVO, SOLO YA NO LO MARCA PORQUE LO SUBÍ ANTES