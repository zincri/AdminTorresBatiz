<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Post;

class AdminSucursalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $sucursales = DB::table('tbl_sucursal')
        ->where("activo","=",1)
        ->get();
        $telefonos = DB::table('tbl_cattelefonos')
        ->where("activo","=",1)
        ->get();

        return view("content.sucursales.index",["sucursales"=>$sucursales,
                                                "telefonos"=>$telefonos]);
    }
    public function create(){
        return view("content.sucursales.create");
    }
    public function edit($id){
        $sucursal = DB::table('tbl_sucursal')
        ->where('id','=',$id)
        ->first();
        $telefonos = DB::table('tbl_cattelefonos')
        ->where('idsucursal','=',$id)
        ->get();

        return view("content.sucursales.edit",['sucursal'=>$sucursal,
                                               'telefonos'=>$telefonos]);
    }
    public function store(Request $request){
        if($request->all()){
            $opcion=1;
            $nombreSucursal = $request->get('nombreSucursal');
            $direccionSucursal = $request->get('direccionSucursal');
            $correoSucursal = $request->get('emailSucursal');
            $direccionGoogleMaps = $request->get('urlGoogleMaps');
            $telefonoPrincipal = $request->get('telefonoPrincipal');
            $telefonoSecundario = $request->get('secondPhone');
            $usuario=Auth::user()->id;
            $sql_sol = "call sp_CRUD_Sucursales
            (
                '".$opcion."',
                '".$nombreSucursal."',
                '".$direccionSucursal."',
                '".$correoSucursal."',
                '".$direccionGoogleMaps."',
                '".$telefonoPrincipal."',
                '".$usuario."',
                '1'
            )";
            $datos = DB::select($sql_sol,array(1,10));

            $sucursalAdded = DB::table('tbl_sucursal')
            ->select('id')
            ->where("nombre","=",$nombreSucursal)
            ->get();
            // dd($sucursalAdded[0]->id);
            // dd($telefonoSecundario[0]);
            $getID = $sucursalAdded[0]->id;
            for($i = 0; $i < count($telefonoSecundario); $i++){
                $sql_sol = "call sp_CRUD_CatTelefonos
            (
                '".$opcion."',
                '".$getID."',
                '".$telefonoSecundario[$i]."',
                '".$usuario."'
            )";
            $datos = DB::select($sql_sol,array(1,10));
            }
            if($datos==null){
                return Redirect::to('administrador/sucursales')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/sucursales');
        }
        else{
            return Redirect::to('administrador/sucursales')->withErrors(['erroregistro'=> 'Error']);
        }
    }

    public function update(Request $request, $id){
        
        if($request->all()){
            
            $opcion=2;
            $nombreSucursal = $request->get('nombreSucursal');
            $direccionSucursal = $request->get('direccionSucursal');
            $correoSucursal = $request->get('emailSucursal');
            $direccionGoogleMaps = $request->get('urlGoogleMaps');
            $telefonoPrincipal = $request->get('telefonoPrincipal');
            $telefonoSecundario = $request->get('secondPhone');
            $usuario=Auth::user()->id;
            $sql_sol = "call sp_CRUD_Sucursales
            (
                '".$opcion."',
                '".$nombreSucursal."',
                '".$direccionSucursal."',
                '".$correoSucursal."',
                '".$direccionGoogleMaps."',
                '".$telefonoPrincipal."',
                '".$usuario."',
                '".$id."'
            )";
            $datos = DB::select($sql_sol,array(1,10));

            if($request->get('secondPhone') == null){
                $opcionCat = 2;
                $sql_sol = "call sp_CRUD_CatTelefonos
            (
                '".$opcionCat."',
                '".$id."',
                '1',
                '".$usuario."'
            )";
            $datos = DB::select($sql_sol,array(1,10));

            }
            else{
                
                $opcionCat1 = 3;
                $sql_sol = "call sp_CRUD_CatTelefonos
                (
                    '".$opcionCat1."',
                    '".$id."',
                    '1',
                    '".$usuario."'
                )";
                $datos = DB::select($sql_sol,array(1,10));
                
                $opcionCat = 4;
                for($i = 0; $i < count($telefonoSecundario); $i++){
                    $sql_sol = "call sp_CRUD_CatTelefonos
                (
                    '".$opcionCat."',
                    '".$id."',
                    '".$telefonoSecundario[$i]."',
                    '".$usuario."'
                )";
                $datos = DB::select($sql_sol,array(1,10));
                }
            }

            if($datos==null){
                return Redirect::to('administrador/sucursales')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/sucursales');
        }
        else{
            return Redirect::to('administrador/sucursales')->withErrors(['erroregistro'=> 'Error']);
        }
        
    }
    
    public function destroy($id){
        
            $opcion = 3;
            $usuario=Auth::user()->id;
            $sql_sol = "call sp_CRUD_Sucursales
            (
                '".$opcion."',
                'no importa',
                'no importa',
                'no importa',
                'no importa',
                'no importa',
                '".$usuario."',
                '".$id."'
            )";
            $datos = DB::select($sql_sol,array(1,10));

            $opcionCat = 5;

            $sql_sol = "call sp_CRUD_CatTelefonos
            (
                '".$opcionCat."',
                '".$id."',
                '1',
                '".$usuario."'
            )";
            $datos = DB::select($sql_sol,array(1,10));

            if($datos==null){
                return Redirect::to('administrador/sucursales')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/sucursales');

        }
    
}
// TODO ES NUEVO, SOLO YA NO LO MARCA PORQUE LO SUBÍ ANTES