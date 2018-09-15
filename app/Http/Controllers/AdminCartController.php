<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
class AdminCartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //AQUI ME QUEDE
        $datos = DB::table('tbl_solicitudcart')->where('activo','=',1)->orderBy('fecha_ins','desc')->get();
        return view('content.carrito.index',['datos' => $datos]);
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
        $datos=DB::table('tbl_solicitudcart')->where('activo','=',1)->where('id','=',$id)->first();
        
        $sql_sol = "call sp_getObjetos
            (
                '".$id."'
            )";
        $productos = DB::select($sql_sol,array(1,10));
        
        
        if($datos==null){
            return Redirect::to('administrador/carrito')->withErrors(['erroregistro'=> 'Error']);
        }
        else{
            $usuario=Auth::user()->id;
            $du =  DB::table('tbl_solicitudcart')
            ->where('id', $id)
            ->update([
                'visto'=> 1,
                'usuario_upd'=>$usuario
            ]);
            return view('content.carrito.show',['datos' => $datos, 'productos' => $productos]);
        }
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
