@extends('layouts.master')

@section('content')

{!! $errors->first('erroregistro','
                    <div class="alert alert-danger">
                        <strong>Warning!</strong>Ocurrio un error, intentelo nuevamente por favor!
                    </div>
')!!}
 <!-- START DEFAULT DATATABLE -->
 <a href="{{URL::action('AdminMarcasController@create')}}"><button class="btn btn-primary">Nueva Marca<span  class="fa fa-plus-circle fa-4x fa-fw"></span></button></a>
 <div class="panel-body table-responsive">
                                    <table class="table datatable custom-table">
                                        <thead>
                                            <tr>
                                                <th>Imagen de la Marca</th>
                                                <th>Nombre de la Marca</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                        @foreach($marcas as $item)
                                        <tr>
                                                <td class="imgContainer"> <img src="{{$item->imagen}}" alt=""> </td>
                                                <td>{{$item->nombre}}</td>
                                                <td>
                                                <a href="" data-target="#message-box-danger-{{$item->id}}" data-toggle="modal"><button class="btn btn-danger" ><i class="fa fa-trash-o"></i></button></a>
                                                </td>
                                                @include('content.marcas.delete')
                                        </tr>
                                        @endforeach
                                           
                                         
                                           
                                        </tbody>
                                    </table>
                               
                            <!-- END DEFAULT DATATABLE -->
                            </div>       
@endsection