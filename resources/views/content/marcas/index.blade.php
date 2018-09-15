@extends('layouts.master')

@section('content')

{!! $errors->first('erroregistro','
                    <div class="alert alert-danger">
                        <strong>Warning!</strong>Ocurrio un error, intentelo nuevamente por favor!
                    </div>
')!!}
 <!-- START DEFAULT DATATABLE -->
 <a href="{{URL::action('AdminMarcasController@create')}}"><button class="btn btn-primary">Nueva marca<span  class="fa fa-plus-circle fa-4x fa-fw"></span></button></a>
 <div class="panel-body table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <!-- <th>Categoria</th> -->
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($datos as $item)
                                        <tr>
                                                <td>{{$item->nombreproducto}}</td>
                                                <!-- <td>{{$item->nombrecategoria}}</td> -->
                                                <td>
                                                <!-- <a href="{{URL::action('AdminMarcasController@show',$item->id)}}"><button class="btn btn-info"><i class="fa fa-eye"></i></button></a>
                                                 &nbsp; -->
                                                <a href="{{ url('administrador/marca', $item->id) }}"><button class="btn btn-success"><i class="fa fa-image"></i></button></a>
                                                 &nbsp;
                                                <a href="{{URL::action('AdminMarcasController@edit',$item->id)}}"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                                                 &nbsp;
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