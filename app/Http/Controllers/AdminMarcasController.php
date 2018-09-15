<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Post;

class AdminMarcasController extends Controller
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
        $datos=DB::table('tbl_catmarcas')
        ->select('tbl_catmarcas.nombre as nombremarca',
                 'tbl_categoriamarca.nombre as nombrecategoria',
                 'tbl_catmarcas.id as id')
        ->where('tbl_catmarcas.activo','=',1)
        ->join('tbl_categoriamarca', 'tbl_catmarcas.idcategoriamarca', '=', 'tbl_categoriamarca.id')
        ->get();
        return view('content.marcas.index', ['datos' => $datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $combo=DB::table('tbl_categoriamarcas')->where('activo','=',1)->get();
        return view('content.marcas.create',['combo' => $combo]);
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
            'nombremarca' => 'required|string|max:99',
            // 'descripcioncorta' => 'required|string|max:1499',
            // 'descripcionlarga' => 'required|string|max:2999',
            'categoriamarca' => 'required',
            'file'=>'required|mimes:jpg,jpeg,png|max:1000',
            'stock' => 'required|numeric|max:1000000'
        ]);

        if($request->file('file')){
            $opcion=1;
            $nombremarca=$request->get('nombremarca');
            // $descripcioncorta=$request->get('descripcioncorta');
            // $descripcionlarga=$request->get('descripcionlarga');
            $categoriamarca=(int)$request->get('categoriamarca');
            $stock=(int)$request->get('stock');
            $usuario=Auth::user()->id;
            $path= Storage::disk('public')->put('imageupload/marcas/principales', $request->file('file'));
            $imagen=asset($path);
            $sql_sol = "call sp_CRUD_marcas
            (
                '".$opcion."',
                '".$nombremarca."',
                '".$imagen."',
                '".$stock."',
                '".$usuario."',
                '".$categoriamarca."',
                '1'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/marcas')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/marcas');
        }
        else{
            //regresar a la pagina de marcas con error de que no se registro
            return Redirect::to('administrador/marcas')->withErrors(['erroregistro'=> 'Error']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $combo=DB::table('tbl_categoriamarca')->where('activo','=',1)->get();
        /**/
        $datos = DB::table('tbl_marca')->where('id','=',$id)->where('activo','=',1)->first();
        if($datos==null){
            return Redirect::to('administrador/marcas')->withErrors(['erroregistro'=> 'Error']);
        }
        return view('content.marcas.edit',['combo' => $combo, 'datos'=>$datos]);
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
            'nombremarca' => 'required|string|max:99',
            'descripcioncorta' => 'required|string|max:1499',
            'descripcionlarga' => 'required|string|max:2999',
            'categoriamarca' => 'required',
            //'file'=>'required|mimes:jpg,jpeg,png|max:1000',
            'stock' => 'required|numeric|max:1000000'
        ]);
        if($request->file('file')){
            $this->validate(request(),[
                'file'=>'required|mimes:jpg,jpeg,png|max:1000'
            ]);
            $opcion=2;
            $nombremarca=$request->get('nombremarca');
            $descripcioncorta=$request->get('descripcioncorta');
            $descripcionlarga=$request->get('descripcionlarga');
            $categoriamarca=(int)$request->get('categoriamarca');
            $stock=(int)$request->get('stock');
            $usuario=Auth::user()->id;
            /*OBTENER IMAGEN ANTERIOR*/ 
            $datos = DB::table('tbl_marca')->where('id','=',$id)->where('activo','=',1)->first();
            /*ELIMINAR LA IMAGEN ANTERIOR*/
            
            //if(Storage::disk('public')->exists($datos->imagen)){
            //    $dele= Storage::disk('public')->delete($datos->imagen);
            //}
            $cadena=substr($datos->imagen, 22,strlen ($datos->imagen));   
            if(Storage::disk('public')->exists($cadena)){
                $dele= Storage::disk('public')->delete($cadena);
            }

            $path= Storage::disk('public')->put('imageupload/marcas/principales', $request->file('file'));
            $imagen=asset($path);
            $sql_sol = "call sp_CRUD_marcas
            (
                '".$opcion."',
                '".$nombremarca."',
                '".$imagen."',
                '".$descripcioncorta."',
                '".$descripcionlarga."',
                '".$stock."',
                '".$usuario."',
                '".$categoriamarca."',
                '".$id."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/marcas')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/marcas');
            
        }
        else{
            $opcion=3;
            $nombremarca=$request->get('nombremarca');
            $descripcioncorta=$request->get('descripcioncorta');
            $descripcionlarga=$request->get('descripcionlarga');
            $categoriamarca=(int)$request->get('categoriamarca');
            $stock=(int)$request->get('stock');
            $usuario=Auth::user()->id;
            $path="no importa";
            $sql_sol = "call sp_CRUD_marcas
            (
                '".$opcion."',
                '".$nombremarca."',
                '".$path."',
                '".$descripcioncorta."',
                '".$descripcionlarga."',
                '".$stock."',
                '".$usuario."',
                '".$categoriamarca."',
                '".$id."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/marcas')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/marcas');

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
        $nombremarca="no importa";
        $descripcioncorta="no importa";
        $descripcionlarga="no importa";
        $categoriamarca=1;
        $stock=1;
        $usuario=Auth::user()->id;
        $path="no importa";

        $sql_sol = "call sp_CRUD_marcas
        (
            '".$opcion."',
            '".$nombremarca."',
            '".$path."',
            '".$descripcioncorta."',
            '".$descripcionlarga."',
            '".$stock."',
            '".$usuario."',
            '".$categoriamarca."',
            '".$id."'
            
        )";
        $datos = DB::select($sql_sol,array(1,10));
        if($datos==null){
            return Redirect::to('administrador/marcas')->withErrors(['erroregistro'=> 'Error']);
        }
        return Redirect::to('administrador/marcas');
    }
}