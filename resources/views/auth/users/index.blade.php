@extends('layouts.master')

@section('content')
                                <div class="panel-body">
                                        <div class="col-md-12">
                                                <a href="{{ URL::action('UsuariosController@create')}}"><button class="btn btn-success btn-block"><span class="fa fa-plus"></span> Nuevo usuario</button></a>
                                        </div>
                                    <br><br><br><br>
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="fa fa-search"></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="¿A quien buscas?"/>
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-primary">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </form> 
                                </div>
                <div class="row">
                       
                        
                      @foreach($usuarios as $item)
                      <div class="col-md-3">
                            <!-- CONTACT ITEM -->
                            <div class="panel panel-default">
                                <div class="panel-body profile">
                                    <div class="profile-image">
                                        <img src="{{asset('images/logogo.jpg')}}" alt="Torres Batiz"/>
                                    </div>
                                    <div class="profile-data">
                                        <div class="profile-data-name">{{$item->name}}</div>
                                        
                                    </div>
                                    
                                </div>                                
                                <div class="panel-body">                                    
                                    <div class="contact-info">
                                         <p><small>Email</small><br/>{{$item->email}}</p>
                                        <p><small>Estado</small><br/>Activo</p>                                   
                                        <p><small>Acceso</small><br/>Administrador</p>
                                        <p>
                                            <a href="{{ URL::action('UsuariosController@edit',$item->id)}}"><button class="btn btn-primary">Eliminar</button></a>
                                        </p> 
                                        
                                    </div>
                                </div>                                
                            </div>
                            <!-- END CONTACT ITEM -->
                        </div>
                      @endforeach
                       
                </div>   
            
@endsection