@extends('layouts.master')

@section('content')
<div class="panel-body">


    {!! $errors->first('erroregistro','
    <div class="alert alert-danger">
        <strong>Warning!</strong>Ocurrio un error, intentelo nuevamente por favor!
    </div>
    ')!!}
    <h2>Solicitud del carrito</h2>

    <hr>
    <div class="row">

        <div class="col-md-6">
            <div>
                <div>
                    <h3 class="panel-title"><strong>Nombre:</strong> </h3>
                </div>
                <div class="panel-body">
                    <p>{{$datos->nombre}}</p>

                </div>
            </div>
            <div>
                <div>
                    <h3 class="panel-title"><strong>Empresa:</strong> </h3>
                </div>
                <div class="panel-body">
                    <p>{{$datos->empresa}}</p>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div>
                <div>
                    <h3 class="panel-title"><strong>Telefono: </strong> </h3>
                </div>
                <div class="panel-body">
                    <p>{{$datos->telefono}}</p>

                </div>
            </div>
            <div>
                <div>
                    <h3 class="panel-title"><strong>Email:</strong> </h3>
                </div>
                <div class="panel-body">
                    <p>{{$datos->email}}</p>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div>
                <div>
                    <h3 class="panel-title"><strong>Mensaje:</strong> </h3>
                </div>
                <div class="panel-body">
                    <p>{{$datos->mensaje}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- CONTACTS WITH CONTROLS -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Productos de la solicitud</h3>         
            </div>
            <div class="panel-body list-group list-group-contacts">  
                @foreach ($productos as $item)
                    <a href="{{URL::action('AdminProductosController@show',$item->id)}}" class="list-group-item">                                    
                        <img src="{{$item->imagen}}" class="pull-left" alt="{{$item->nombre}}"/>
                        <span class="contacts-title">Nombre del producto: {{$item->nombre}}</span>
                        <p><span class="contacts-title">Cantidad: {{$item->cantidad}}</span></p>                          
                        <div class="list-group-controls">
                            <button class="btn btn-primary btn-rounded"><span class="fa fa-eye"></span></button>
                        </div>                                    
                    </a> 
                @endforeach                               
            </div>
        </div>
        <!-- END CONTACTS WITH CONTROLS -->
    </div>


    <div class="panel-footer">
        <a href="{{url('administrador/carrito')}}"><button class="btn btn-primary pull-right">Atras</button></a>
    </div>
    <br>

</div>
@endsection
