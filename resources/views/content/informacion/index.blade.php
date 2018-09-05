@extends('layouts.master')

@section('content')
<div class="panel-body">


{!! $errors->first('erroregistro','
                    <div class="alert alert-danger">
                        <strong>Warning!</strong>Ocurrio un error, intentelo nuevamente por favor!
                    </div>
')!!}
    <h2>Informacion General</h2>
                                    <hr>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div>
                                                <div>
                                                    <h3 class="panel-title" ><strong>Descripcion:</strong>  </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->descripcion}}</p>
                                                    
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

                                        <div class="col-md-6">
                                        <div>
                                                <div >
                                                    <h3 class="panel-title"><strong>Direccion: </strong> </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->direccion}}</p>
                                                    
                                                </div>                                    
                                             </div>
                                             <div>
                                                <div>
                                                    <h3 class="panel-title"><strong>Telefono:</strong>  </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->telefono}}</p>
                                                    
                                                </div>                                    
                                             </div>
                                             
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div>
                                                <div>
                                                    <h3 class="panel-title" ><strong>Mision:</strong>  </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->mision}}</p>
                                                    
                                                </div>                                    
                                             </div>
                                             <div>
                                                <div>
                                                    <h3 class="panel-title"><strong>Vision:</strong>  </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->vision}}</p>
                                                    
                                                </div>                                    
                                             </div>
                                        </div>

                                        <div class="col-md-6">
                                        <div>
                                                <div >
                                                    <h3 class="panel-title"><strong>Objetivos: </strong> </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->objetivos}}</p>
                                                    
                                                </div>                                    
                                             </div>
                                             <div>
                                                <div>
                                                    <h3 class="panel-title"><strong>Video Principal:</strong>  </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->videoprincipal}}</p>
                                                    
                                                </div>                                    
                                             </div>
                                             
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div>
                                                <div>
                                                    <h3 class="panel-title" ><strong>Historia:</strong>  </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->textohistoria}}</p>
                                                    
                                                </div>                                    
                                             </div>
                                             <div>
                                                <div>
                                                    <h3 class="panel-title"><strong>Reseña:</strong>  </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->textoresena}}</p>
                                                    
                                                </div>                                    
                                             </div>
                                        </div>

                                        
                                             
                                    </div>

                                <div class="panel-footer">                                   
                                   <a  href="{{URL::action('InformacionController@edit',$datos->id)}}" ><button class="btn btn-primary pull-right">Editar Datos</button></a> 
                                </div>
                                <br>
                                
</div>
@endsection