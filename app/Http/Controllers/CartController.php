<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\SolicitudCarritoRequest;

class CartController extends Controller
{
    public function __construct()
    {
        $informaciongeneral = DB::table('tbl_informaciongeneral')->first();
        $sucursales = DB::table('tbl_sucursal')->where('activo','=',1)->get();
        $servicios = DB::table('tbl_serviciosinformacion')->where('activo','=',1)->get();
        $redes = DB::table('tbl_catredessociales')->where('activo','=',1)->limit(5)->get();
        
        session()->put('informacion', $informaciongeneral);
        session()->put('sucursales', $sucursales);
        session()->put('servicios', $servicios);
        session()->put('redes', $redes);
    
        if(!\Session::has('cart')) \Session::put('cart',array());

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
        return view('principal.navbar.cart',["informaciongeneral"=>$informaciongeneral,
                                            "marcas"=>$marcas,
                                            "videos"=>$videos]);
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
    public function store(SolicitudCarritoRequest $request)
    {
        $opcion=4;
        $nombre=$request->get('nombre');
        $nombreempresa=$request->get('empresa');
        if(empty($nombreempresa)){
            $nombreempresa='Sin empresa';
        }
        $telefono=$request->get('telefono');
        $email=$request->get('email');
        $mensaje=$request->get('mensaje');
        $modelo="sin modelo";
        $usuario=2;
        
        /*
        No necesarios*/

        $blanconegro=1;
        $color=1;
        $volumen=1;
        /**/
        
        
        
        $sql_solicitud = "call sp_setSolicitud
        (
            '".$opcion."',
            '".$nombre."',
            '".$nombreempresa."',
            '".$telefono."',
            '".$email."',
            '".$blanconegro."',
            '".$color."',
            '".$volumen."',
            '".$mensaje."',
            '".$modelo."',
            '".$usuario."'
            
        )";
        $idsolicitudr = DB::select($sql_solicitud,array(1,10));
        $idsolicitud=(int)$idsolicitudr[0]->id;
        
        if($idsolicitud != null)
        {
            $cart = \Session::get('cart');
        
            foreach($cart as $item){
                $objeto=(int)$item->id;
                $itcantidad=(int)$item->cantidad;
                $sql_sol = "call sp_setobjetos
                (
                    '".$idsolicitud."',
                    '".$objeto."',
                    '".$itcantidad."',
                    '2'
                    
                )";
                $dato = DB::select($sql_sol,array(1,10));
            }
            return Redirect::to('cart/show')->with("success","Hemos recibido su solicitud. Nos comunicaremos con usted en su brevedad.");
        }
        else
        {
            return Redirect::to('cart/show')->with("error","Ha ocurrido un error al enviar su formulario. Inténtelo más tarde.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $informaciongeneral = DB::table('tbl_informaciongeneral')->first();
        $marcas = DB::table('tbl_catmarcas')->where('activo','=',1)->get();
        $videos = DB::table('tbl_catvideos')->where('activo','=',1)->get();
        return view('principal.navbar.cart',["informaciongeneral"=>$informaciongeneral,
                                            "marcas"=>$marcas,
                                            "videos"=>$videos]);
    }

    public function add($id, $cantidad)
    {
        try{
        $mensaje = "";
        $flag=false;
        $a=DB::table('tbl_productogeneral')->where('activo','=',1)->where('id','=',$id)->first();
        $cart=\Session::get('cart');
        $entid=(int)$id;
        foreach($cart as $item){
            $entero=(int)$item->id;
            if($entero == $entid) {
                $flag=true;
                break;   
            }
           
        }
        if($flag==true){
            $cantidadnueva=(int)$cart[$id]->cantidad;
            $cantidadA=(int)$cantidad;
            $cantidadnueva=$cantidadnueva+$cantidadA;
            $cart[$id]->cantidad=$cantidadnueva;
            
        }
        else {
            $a->cantidad=$cantidad;
            $cart[$id]=$a;
            \Session::put('cart',$cart);
        }
        
        return redirect()->route('producto-detalle',['producto' => $id])->with('message',"success");
        }
        catch(Exception $e){
        return redirect()->route('producto-detalle',['producto' => $id])->with('message',"error");
            
        }
        
        
    }

    public function delete($id)
    {
        
        $cart=\Session::get('cart');
        unset($cart[$id]);
        \Session::put('cart',$cart);
        return redirect()->route('cart-show');
        
    }

    public function vaciar()
    {
        
        \Session::forget('cart');
        return redirect()->route('cart-show');
    }


    public function refresh($id, $cantidad)
    {
        
        $cart=\Session::get('cart');
        //dd($id.":".$cantidad);
        
        $cart[$id]->cantidad=$cantidad;
        \Session::put('cart',$cart);
        return redirect()->route('cart-show');
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
