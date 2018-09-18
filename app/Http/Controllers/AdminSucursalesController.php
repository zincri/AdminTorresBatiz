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
        dd("hola");
    }
    public function edit($id){
        dd($id);
    }
    public function destroy($id){
        dd("Destroy " + $id);
    }
}
