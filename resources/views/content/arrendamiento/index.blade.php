@extends('layouts.master')

@section('content')
{!! $errors->first('erroregistro','
                    <div class="alert alert-danger">
                        <strong>Warning!</strong>Ocurrio un error, intentelo nuevamente por favor!
                    </div>
')!!}
<div class="panel-body table-responsive">
        <table class="table datatable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos as $item)
                <tr>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->empresa}}</td>
                    <td>{{$item->fecha_ins}}</td>
                    <td>
                        <a href="{{URL::action('AdminArrendamientoController@show',$item->id)}}"><button class="btn btn-info"><i
                                    class="fa fa-eye"></i></button></a>
                        
                    </td>
                </tr>
                @endforeach
    
            </tbody>
        </table>
    
        <!-- END DEFAULT DATATABLE -->
    </div>

@endsection 