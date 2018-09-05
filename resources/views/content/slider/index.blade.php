@extends('layouts.master')

@section('content')
 <!-- START DEFAULT DATATABLE -->
 
                    
{!! $errors->first('erroregistro','
                    <div class="alert alert-danger">
                        <strong>Warning!</strong>Ocurrio un error, intentelo nuevamente por favor!
                    </div>
')!!}

 <a href="{{URL::action('SliderController@create')}}"><button class="btn btn-primary">Nueva presentacion<span  class="fa fa-plus-circle fa-4x fa-fw"></span></button></a>
 <div class="panel-body table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Nombre presentacion</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($datos as $item)
                                        <tr>
                                                <td>{{$item->titulo}}</td>
                                                
                                                <td>
                                                <a href="{{URL::action('SliderController@edit',$item->id)}}"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                                                 &nbsp;
                                                <a href="" data-target="#message-box-danger-{{$item->id}}" data-toggle="modal"><button class="btn btn-danger" ><i class="fa fa-trash-o"></i></button></a>
                                                </td>
                                                @include('content.slider.delete')
                                        </tr>
                                        @endforeach
                                           
                                         
                                           
                                        </tbody>
                                    </table>
                               
                            <!-- END DEFAULT DATATABLE -->
                            </div>       
@endsection