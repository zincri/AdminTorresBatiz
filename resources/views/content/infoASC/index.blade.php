@extends('layouts.master')

@section('content')

{!! $errors->first('erroregistro','
                    <div class="alert alert-danger">
                        <strong>Warning!</strong>Ocurrio un error, intentelo nuevamente por favor!
                    </div>
')!!}
 <!-- START DEFAULT DATATABLE -->
 
 <div class="panel-body table-responsive">
                                    <table class="table datatable custom-table">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Página</th>
                                                <th>Título</th>
                                                <th>Descripción</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                        @foreach($info as $item)
                                        <tr>
                                                <td class="imgContainer"> <img src="{{$item->imagen}}" alt=""> </td>
                                                <td>{{ $item->pagina }}</td>
                                                <td>{{$item->titulo}}</td>
                                                <td>{{$item->descripcion}}</td>
                                                <td>
                                                <a href="{{URL::action('AdminASCController@edit',$item->id)}}"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>
                                                 &nbsp;
                                                </td>
                                        </tr>
                                        @endforeach
                                           
                                         
                                           
                                        </tbody>
                                    </table>
                               
                            <!-- END DEFAULT DATATABLE -->
                            </div>       
                            <!-- Aquí todo es nuevo, no lo marca por el commit de antes -->
@endsection