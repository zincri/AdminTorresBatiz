<?php

namespace App\Http\Controllers;
use App\Http\Requests\InformacionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;

class InformacionController extends Controller
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
        $informacion = DB::table('tbl_informaciongeneral')->first();
        return view('content.informacion.index',["datos"=>$informacion]);
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
    public function store(InformacionRequest $request)
    {
        //
        //$opcion=4;
        $id=1;
        $direccion=$request->get('direccion');
        $email=$request->get('email');
        $telefono=$request->get('telefono');
        $descripcion=$request->get('descripcion');
        $mision=$request->get('mision');
        $vision=$request->get('vision');
        $objetivos=$request->get('objetivos');
        $textoresena1=$request->get('textoresena1');
        $textoresena2=$request->get('textoresena2');
        $videoprincipal=$request->get('videoprincipal');
        $usuario=Auth::user()->id;
        

        $datos =  DB::table('tbl_informaciongeneral')
        ->where('id', $id)
        ->update([
            'descripcion' => $descripcion,
            'email'=>$email,
            'telefono'=>$telefono,
            'direccion'=>$direccion,
            'mision' => $mision,
            'vision'=>$vision,
            'objetivos'=>$objetivos,
            'textohistoria'=>$textoresena1,
            'textoresena'=>$textoresena2,
            'videoprincipal'=>$videoprincipal,
            'usuario_upd'=>$usuario
        ]);
        
        return Redirect::to('administrador/informacion');
        

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
        $informacion = DB::table('tbl_informaciongeneral')->first();
         
        return view('content.informacion.edit',["datos"=>$informacion]);
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
        if($request->file('imagennosotros') == null && $request->file('imagenbannersecundario') == null){
            $opcion = 1;
            $tituloNosotros = $request->get('tituloNosotros');
            $direccion = $request->get('direccion');
            $email = $request->get('email');
            $telefono = $request->get('telefono');
            $descripcion = $request->get('descripcion');
            $mision = $request->get('mision');
            $vision = $request->get('vision');
            $objetivos = $request->get('objetivos');
            $tituloresena1 = $request->get('tituloresena1');
            $resena1 = $request->get('textoresena1');
            $tituloresena2 = $request->get('tituloresena2');
            $resena2 = $request->get('textoresena2');
            $videoPrincipal = $request->get('videoprincipal');
            $usuario=Auth::user()->id;
            $imagenNosotros = 'no importa';
            $imagenBannerSecundario = 'no importa';
            $sql_sol = "call sp_CRUD_InformacionGeneral
            (
                '".$opcion."',
                '".$direccion."',
                '".$email."',
                '".$descripcion."',
                '".$mision."',
                '".$vision."',
                '".$objetivos."',
                '".$telefono."',
                '".$tituloresena1."',
                '".$resena1."',
                '".$tituloresena2."',
                '".$resena2."',
                '".$videoPrincipal."',
                '".$tituloNosotros."',
                '".$imagenNosotros."',
                '".$imagenBannerSecundario."',
                '".$usuario."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/informacion')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/informacion');
        }
        else if($request->file('imagennosotros') == null && $request->file('imagenbannersecundario') != null){
            /*OBTENER IMAGEN ANTERIOR*/ 
            $datos = DB::table('tbl_informaciongeneral')->where('id','=',1)->where('activo','=',1)->first();
            /*ELIMINAR LA IMAGEN ANTERIOR*/
            
            $cadena=substr($datos->imagenbannersecundario, 22,strlen ($datos->imagenbannersecundario));   
            if(Storage::disk('public')->exists($cadena)){
                $dele= Storage::disk('public')->delete($cadena);
            }

            $path= Storage::disk('public')->put('imageupload/infoGeneral/bannerSecundario', $request->file('imagenbannersecundario'));
            $imagenBannerSecundario=asset($path);


            /////////////////////////////

            $opcion = 2;
            $tituloNosotros = $request->get('tituloNosotros');
            $direccion = $request->get('direccion');
            $email = $request->get('email');
            $telefono = $request->get('telefono');
            $descripcion = $request->get('descripcion');
            $mision = $request->get('mision');
            $vision = $request->get('vision');
            $objetivos = $request->get('objetivos');
            $tituloresena1 = $request->get('tituloresena1');
            $resena1 = $request->get('textoresena1');
            $tituloresena2 = $request->get('tituloresena2');
            $resena2 = $request->get('textoresena2');
            $videoPrincipal = $request->get('videoprincipal');
            $usuario=Auth::user()->id;
            $imagenNosotros = 'no importa';
            $sql_sol = "call sp_CRUD_InformacionGeneral
            (
                '".$opcion."',
                '".$direccion."',
                '".$email."',
                '".$descripcion."',
                '".$mision."',
                '".$vision."',
                '".$objetivos."',
                '".$telefono."',
                '".$tituloresena1."',
                '".$resena1."',
                '".$tituloresena2."',
                '".$resena2."',
                '".$videoPrincipal."',
                '".$tituloNosotros."',
                '".$imagenNosotros."',
                '".$imagenBannerSecundario."',
                '".$usuario."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/informacion')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/informacion');


        }
        else if($request->file('imagennosotros') != null && $request->file('imagenbannersecundario') == null){
            /*OBTENER IMAGEN ANTERIOR*/ 
            $datos = DB::table('tbl_informaciongeneral')->where('id','=',1)->where('activo','=',1)->first();
            /*ELIMINAR LA IMAGEN ANTERIOR*/
            
            $cadena=substr($datos->imagennosotros, 22,strlen ($datos->imagennosotros));   
            if(Storage::disk('public')->exists($cadena)){
                $dele= Storage::disk('public')->delete($cadena);
            }

            $path= Storage::disk('public')->put('imageupload/infoGeneral/imagenNosotros', $request->file('imagennosotros'));
            $imagenNosotros=asset($path);
            /////////////////////////////

            $opcion = 3;
            $tituloNosotros = $request->get('tituloNosotros');
            $direccion = $request->get('direccion');
            $email = $request->get('email');
            $telefono = $request->get('telefono');
            $descripcion = $request->get('descripcion');
            $mision = $request->get('mision');
            $vision = $request->get('vision');
            $objetivos = $request->get('objetivos');
            $tituloresena1 = $request->get('tituloresena1');
            $resena1 = $request->get('textoresena1');
            $tituloresena2 = $request->get('tituloresena2');
            $resena2 = $request->get('textoresena2');
            $videoPrincipal = $request->get('videoprincipal');
            $usuario=Auth::user()->id;
            $imagenBannerSecundario = 'no importa';
            $sql_sol = "call sp_CRUD_InformacionGeneral
            (
                '".$opcion."',
                '".$direccion."',
                '".$email."',
                '".$descripcion."',
                '".$mision."',
                '".$vision."',
                '".$objetivos."',
                '".$telefono."',
                '".$tituloresena1."',
                '".$resena1."',
                '".$tituloresena2."',
                '".$resena2."',
                '".$videoPrincipal."',
                '".$tituloNosotros."',
                '".$imagenNosotros."',
                '".$imagenBannerSecundario."',
                '".$usuario."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/informacion')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/informacion');
        }
        else if($request->file('imagennosotros') != null && $request->file('imagenbannersecundario') != null){
            /*OBTENER IMAGEN ANTERIOR*/ 
            $datos2 = DB::table('tbl_informaciongeneral')->where('id','=',1)->where('activo','=',1)->first();
            /*ELIMINAR LA IMAGEN ANTERIOR*/
            
            $cadena=substr($datos2->imagennosotros, 22,strlen ($datos2->imagennosotros));   
            if(Storage::disk('public')->exists($cadena)){
                $dele= Storage::disk('public')->delete($cadena);
            }
            $cadena2=substr($datos2->imagenbannersecundario, 22,strlen ($datos2->imagenbannersecundario));   
            if(Storage::disk('public')->exists($cadena2)){
                $dele= Storage::disk('public')->delete($cadena2);
            }

            $path2= Storage::disk('public')->put('imageupload/infoGeneral/bannerSecundario', $request->file('imagenbannersecundario'));
            $imagenBannerSecundario=asset($path2);

            $path= Storage::disk('public')->put('imageupload/infoGeneral/imagenNosotros', $request->file('imagennosotros'));
            $imagenNosotros=asset($path);
            /////////////////////////////

            $opcion = 4;
            $tituloNosotros = $request->get('tituloNosotros');
            $direccion = $request->get('direccion');
            $email = $request->get('email');
            $telefono = $request->get('telefono');
            $descripcion = $request->get('descripcion');
            $mision = $request->get('mision');
            $vision = $request->get('vision');
            $objetivos = $request->get('objetivos');
            $tituloresena1 = $request->get('tituloresena1');
            $resena1 = $request->get('textoresena1');
            $tituloresena2 = $request->get('tituloresena2');
            $resena2 = $request->get('textoresena2');
            $videoPrincipal = $request->get('videoprincipal');
            $usuario=Auth::user()->id;
            $sql_sol = "call sp_CRUD_InformacionGeneral
            (
                '".$opcion."',
                '".$direccion."',
                '".$email."',
                '".$descripcion."',
                '".$mision."',
                '".$vision."',
                '".$objetivos."',
                '".$telefono."',
                '".$tituloresena1."',
                '".$resena1."',
                '".$tituloresena2."',
                '".$resena2."',
                '".$videoPrincipal."',
                '".$tituloNosotros."',
                '".$imagenNosotros."',
                '".$imagenBannerSecundario."',
                '".$usuario."'
                
            )";
            $datos = DB::select($sql_sol,array(1,10));
            if($datos==null){
                return Redirect::to('administrador/informacion')->withErrors(['erroregistro'=> 'Error']);
            }
            return Redirect::to('administrador/informacion');


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
        //
    }
}
