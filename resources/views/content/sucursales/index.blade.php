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
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Nombre de la sucursal</th>
                                                <th>Dirección de la promoción</th>
                                                <th>Email</th>
                                                <th>URL de Google Maps</th>
                                                <th>Teléfonos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                        @foreach($sucursales as $item)
                                        <tr>
                                                <td>{{ $item->nombre }}</td>
                                                <td>{{ $item->direccion }}</td>
                                                <td>{{ $item->urlgooglemaps }}</td>
                                                <td>
                                                    <ul>
                                                    @foreach($telefonos as $itemT)
                                                    @if($item->id == $itemT->idsucursal)
                                                        <li>{{ $itemT->telefono }}</li>
                                                    @endif
                                                    @endforeach
                                                    </ul>
                                                </td>
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
@endsection