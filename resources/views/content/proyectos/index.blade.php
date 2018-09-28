@extends('layouts.master')

@section('content')

{!! $errors->first('erroregistro','
                    <div class="alert alert-danger">
                        <strong>Warning!</strong>Ocurrio un error, intentelo nuevamente por favor!
                    </div>
')!!}
 <!-- START DEFAULT DATATABLE -->
 <a href="{{URL::action('AdminProyectosController@create')}}"><button class="btn btn-primary">Nuevo Proyecto<span  class="fa fa-plus-circle fa-4x fa-fw"></span></button></a>
 <div class="panel-body table-responsive">
                                    <table class="table datatable custom-table">
                                        <thead>
                                            <tr>
                                                <th>Imagen del Proyecto</th>
                                                <th>Título del proyecto</th>
                                                <th>Descripción de Proyecto</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                        @foreach($proyectos as $item)
                                        <tr>
                                                <td class="imgContainer"> <img src="{{$item->imagen}}" alt=""> </td>
                                                <td>{{$item->titulo}}</td>
                                                <td>{{$item->descripcion}}</td>
                                                <td>
                                                <a href="{{URL::action('AdminProyectosController@edit',$item->id)}}"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                                                 &nbsp;
                                                <a href="" data-target="#message-box-danger-{{$item->id}}" data-toggle="modal"><button class="btn btn-danger" ><i class="fa fa-trash-o"></i></button></a>
                                                </td>
                                                @include('content.proyectos.delete')
                                        </tr>
                                        @endforeach
                                           
                                         
                                           
                                        </tbody>
                                    </table>
                               
                            <!-- END DEFAULT DATATABLE -->
                            </div>       
                            <!-- Aquí todo es nuevo, no lo marca por el commit de antes -->
@endsection