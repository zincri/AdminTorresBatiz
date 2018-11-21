@extends('layouts.master')

@section('content')
<div class="panel-body">


{!! $errors->first('erroregistro','
                    <div class="alert alert-danger">
                        <strong>Warning!</strong>Ocurrio un error, intentelo nuevamente por favor!
                    </div>
')!!}
    <h2>Solicitud arrendamiento</h2>
    
                                    <hr>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div>
                                                <div>
                                                    <h3 class="panel-title" ><strong>Nombre:</strong>  </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->nombre}}</p>
                                                    
                                                </div>                                    
                                             </div>
                                             <div>
                                                <div>
                                                    <h3 class="panel-title"><strong>Empresa:</strong>  </h3>
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
                                                    <h3 class="panel-title"><strong>Email:</strong>  </h3>
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
                                                    <h3 class="panel-title"><strong>Blanco y Negro: </strong> </h3>
                                                </div>
                                                <div class="panel-body">
                                                    @if($datos->byn == 1)
                                                    <p> si </p>
                                                    @else
                                                    <p> no </p>
                                                    @endif 
                                                </div>                                    
                                             </div>
                                             <div>
                                                <div>
                                                    <h3 class="panel-title"><strong>Color:</strong>  </h3>
                                                </div>
                                                <div class="panel-body">
                                                    @if($datos->color == 1)
                                                 <p> si </p>
                                                @else
                                                 <p> no </p>
                                                @endif 
                                                </div>                                    
                                             </div>
                                             
                                        </div>

                                        <div class="col-md-6">

                                            <div>
                                                <div>
                                                    <h3 class="panel-title"><strong>Volumen:</strong>  </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->volumen}}</p>
                                                </div>                                    
                                             </div>

                                            <div>
                                                <div>
                                                    <h3 class="panel-title" ><strong>Mensaje:</strong>  </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->mensaje}}</p>
                                                </div>                                    
                                             </div>
                                             
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <div>
                                                    <h3 class="panel-title"><strong>Tamaño máximo de hoja:</strong>  </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->hojasize}}</p>
                                                </div>                                    
                                             </div>
                                        </div>
                                    </div>


                                <div class="panel-footer">                                   
                                   <a  href="{{url('administrador/arrendamiento')}}" ><button class="btn btn-primary pull-right">Atras</button></a> 
                                </div>
                                <br>
                                
</div>
@endsection