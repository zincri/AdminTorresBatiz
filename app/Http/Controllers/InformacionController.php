<?php

namespace App\Http\Controllers;
use App\Http\Requests\InformacionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
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
