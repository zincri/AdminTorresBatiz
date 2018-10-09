@extends('layouts.master')

@section('content')

{!! $errors->first('erroregistro','
                    <div class="alert alert-danger">
                        <strong>Warning!</strong>Ocurrio un error, intentelo nuevamente por favor!
                    </div>
')!!}
 <!-- START DEFAULT DATATABLE -->
 <a href="{{URL::action('AdminPromocionesController@create')}}"><button class="btn btn-primary">Nueva promoción<span  class="fa fa-plus-circle fa-4x fa-fw"></span></button></a>
 <div class="panel-body table-responsive">
                                    <table class="table datatable custom-table">
                                        <thead>
                                            <tr>
                                                <th>Imagen de la promoción</th>
                                                <th>Nombre de la promoción</th>
                                                <th>Productos asociados</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                        @foreach($promociones as $item)
                                        <tr>
                                                <td class="imgContainer"> <img src="{{$item->Imagen}}" alt=""> </td>
                                                <td>{{$item->Nombre}}</td>
                                                <td>
                                                <!-- <a href="{{ URL::action('AdminPromocionesController@show', $item->id) }}"><button class="btnCustomSee">Ver productos asociados</button></a></td> -->
                                                <a href="{{ URL::action('AdminPromocionesController@show', $item->id) }}"><button class="btnCustomSee">Ver productos asociados</button></a>
                                                <td>
                                                <a href="{{URL::action('AdminPromocionesController@edit',$item->id)}}"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                                                 &nbsp;
                                                <a href="" data-target="#message-box-danger-{{$item->id}}" data-toggle="modal"><button class="btn btn-danger" ><i class="fa fa-trash-o"></i></button></a>
                                                </td>
                                                @include('content.promociones.delete')
                                        </tr>
                                        @endforeach   
                                        </tbody>
                                    </table>
                               
                            <!-- END DEFAULT DATATABLE -->
                            </div>       
                            <!-- Aquí todo es nuevo, no lo marca por el commit de antes -->
@endsection