<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Post;

class AdminProductosController extends Controller
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
        //
        $datos=DB::table('tbl_productogeneral')
        ->select('tbl_productogeneral.nombre as nombreproducto',
                 'tbl_categoriaproducto.nombre as nombrecategoria',
                 'tbl_productogeneral.id as id')
        ->where('tbl_productogeneral.activo','=',1)
        ->join('tbl_categoriaproducto', 'tbl_productogeneral.idcategoriaproducto', '=', 'tbl_categoriaproducto.id')
        ->get();
        return view('content.productos.index', ['datos' => $datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $combo=DB::table('tbl_categoriaproducto')->where('activo','=',1)->get();
        return view('content.productos.create',['combo' => $combo]);
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
            'nombreproducto' => 'required|string|max:99',
            'descripcioncorta' => 'required|string|max:1499',
            'descripcionlarga' => 'required|string|max:2999',
            'categoriaproducto' => 'required',
            'file'=>'required|mimes:jpg,jpeg,png|max:1000',
            'stock' => 'required|numeric|max:1000000'
        ]);

        if($request->file('file')){
            $opcion=1;
            $nombreproducto=$request->get('nombreproducto');
            $descripcioncorta=$request->get('descripcioncorta');
            $descripcionlarga=$request->get('descripcionlarga');
            $categoriaproducto=(int)$request->get('categoriaproducto');
            $stock=(int)$request->get('stock');
            $usuario=Auth::user()->id;
            $path= Storage::disk('public')->put('imageupload/productos/principales', $request->file('file'));
            $imagen=asset($path);
            $sql_sol = "call sp_CRUD_Productos
            (
                '".$opcion."',
                '".$nombreproducto."',
                '".$imagen."',
                '".$descripcioncorta."',
                '".$descripcionlarga."',
                '".$stock."',
                '".$usuario."',
                '".$categoriaproducto."',
                '1'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/productos')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/productos');
        }
        else{
            //regresar a la pagina de productos con error de que no se registro
            return Redirect::to('administrador/productos')->withErrors(['erroregistro'=> 'Error']);
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
        //$combo=DB::table('tbl_categoriaproducto')->where('activo','=',1)->get();
        /**/
        $datos = DB::table('tbl_producto')->where('id','=',$id)->where('activo','=',1)->first();
        
        if($datos==null){
            return Redirect::to('administrador/productos')->withErrors(['erroregistro'=> 'Error']);
        }
        $categoria = DB::table('tbl_categoriaproducto')
        ->where('activo','=',1)
        ->where('id','=',$datos->idcategoriaproducto)
        ->first();
        $galeria = DB::table('tbl_galeria')->where('idproducto','=',$id)->where('activo','=',1)->get();
        return view('content.productos.show',['datos'=>$datos, 'galeria' => $galeria, 'categoria'=>$categoria]);
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
        $combo=DB::table('tbl_categoriaproducto')->where('activo','=',1)->get();
        /**/
        $datos = DB::table('tbl_producto')->where('id','=',$id)->where('activo','=',1)->first();
        if($datos==null){
            return Redirect::to('administrador/productos')->withErrors(['erroregistro'=> 'Error']);
        }
        return view('content.productos.edit',['combo' => $combo, 'datos'=>$datos]);
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
        $credentials=$this->validate(request(),[
            'nombreproducto' => 'required|string|max:99',
            'descripcioncorta' => 'required|string|max:1499',
            'descripcionlarga' => 'required|string|max:2999',
            'categoriaproducto' => 'required',
            // 'file'=>'required|mimes:jpg,jpeg,png|max:1000',
            'stock' => 'required|numeric|max:1000000'
        ]);
        if($request->file('file')){
            $this->validate(request(),[
                'file'=>'required|mimes:jpg,jpeg,png|max:5000'
            ]);
            $opcion=2;
            $nombreproducto=$request->get('nombreproducto');
            $descripcioncorta=$request->get('descripcioncorta');
            $descripcionlarga=$request->get('descripcionlarga');
            $categoriaproducto=(int)$request->get('categoriaproducto');
            $stock=(int)$request->get('stock');
            $usuario=Auth::user()->id;
            /*OBTENER IMAGEN ANTERIOR*/ 
            $datos = DB::table('tbl_producto')->where('id','=',$id)->where('activo','=',1)->first();
            /*ELIMINAR LA IMAGEN ANTERIOR*/
            
            //if(Storage::disk('public')->exists($datos->imagen)){
            //    $dele= Storage::disk('public')->delete($datos->imagen);
            //}
            $cadena=substr($datos->imagen, 22,strlen ($datos->imagen));   
            if(Storage::disk('public')->exists($cadena)){
                $dele= Storage::disk('public')->delete($cadena);
            }

            $path= Storage::disk('public')->put('imageupload/productos/principales', $request->file('file'));
            $imagen=asset($path);
            $sql_sol = "call sp_CRUD_Productos
            (
                '".$opcion."',
                '".$nombreproducto."',
                '".$imagen."',
                '".$descripcioncorta."',
                '".$descripcionlarga."',
                '".$stock."',
                '".$usuario."',
                '".$categoriaproducto."',
                '".$id."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/productos')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/productos');
            
        }
        else{
            $opcion=3;
            $nombreproducto=$request->get('nombreproducto');
            $descripcioncorta=$request->get('descripcioncorta');
            $descripcionlarga=$request->get('descripcionlarga');
            $categoriaproducto=(int)$request->get('categoriaproducto');
            $stock=(int)$request->get('stock');
            $usuario=Auth::user()->id;
            $path="no importa";
            $sql_sol = "call sp_CRUD_Productos
            (
                '".$opcion."',
                '".$nombreproducto."',
                '".$path."',
                '".$descripcioncorta."',
                '".$descripcionlarga."',
                '".$stock."',
                '".$usuario."',
                '".$categoriaproducto."',
                '".$id."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/productos')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/productos');

        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $opcion=4;
        $nombreproducto="no importa";
        $descripcioncorta="no importa";
        $descripcionlarga="no importa";
        $categoriaproducto=1;
        $stock=1;
        $usuario=Auth::user()->id;
        $path="no importa";

        $sql_sol = "call sp_CRUD_Productos
        (
            '".$opcion."',
            '".$nombreproducto."',
            '".$path."',
            '".$descripcioncorta."',
            '".$descripcionlarga."',
            '".$stock."',
            '".$usuario."',
            '".$categoriaproducto."',
            '".$id."'
            
        )";
        $datos = DB::select($sql_sol,array(1,10));
        if($datos==null){
            return Redirect::to('administrador/productos')->withErrors(['erroregistro'=> 'Error']);
        }
        return Redirect::to('administrador/productos');
    }
}
