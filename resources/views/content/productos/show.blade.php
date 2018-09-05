@extends('layouts.master')

@section('content')
<div class="panel-body">


{!! $errors->first('erroregistro','
                    <div class="alert alert-danger">
                        <strong>Warning!</strong>Ocurrio un error, intentelo nuevamente por favor!
                    </div>
')!!}
    <h2>{{$datos->nombre}}</h2>
                                    <hr>
                                            <div class="gallery" id="links">
                                                <a class="gallery-item" href="{{$datos->imagen}}" title="Girls Image 1" data-gallery>
                                                    <div class="image">
                                                        <img src="{{$datos->imagen}}" alt="Girls Image 1"/>                                        
                                                        <ul class="gallery-item-controls">
                                                            <li><label class="check"><input type="checkbox" class="icheckbox"/></label></li>
                                                            <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                                        </ul>                                                                    
                                                    </div>
                                                    <div class="meta">
                                                        <strong>Imagen principal</strong>
                                                    </div>                                
                                                </a> 
                                            </div>  
                                    <div class="row">
                                        <div class="col-md-12">
                                             <div>
                                                <div>
                                                    <h3 class="panel-title"><strong>Descripcion larga:</strong>  </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->descripcionlarga}}</p>
                                                    
                                                </div>                                    
                                             </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div>
                                                <div>
                                                    <h3 class="panel-title" ><strong>Descripcion corta:</strong>  </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->descripcioncorta}}</p>
                                                    
                                                </div>                                    
                                             </div>
                                             
                                        </div>

                                        <div class="col-md-6">
                                        <div>
                                                <div >
                                                    <h3 class="panel-title"><strong>Categoria del producto: </strong> </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->idcategoriaproducto}}</p>
                                                    
                                                </div>                                    
                                             </div>
                                             <div>
                                                <div>
                                                    <h3 class="panel-title"><strong>Stock:</strong>  </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p>{{$datos->stock}}</p>
                                                    
                                                </div>                                    
                                             </div>
                                             
                                    </div>
                                    <h3>GALERIA </h3>
                                    <div class="row">
                                            <div class="gallery" id="links">
                                                @foreach($galeria as $item)
                                                <a class="gallery-item" href="{{$item->imagen}}" title="Girls Image 1" data-gallery>
                                                    <div class="image">
                                                        <img src="{{$item->imagen}}" alt="Girls Image 1"/>                                        
                                                        <ul class="gallery-item-controls">
                                                            <li><label class="check"><input type="checkbox" class="icheckbox"/></label></li>
                                                            <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                                        </ul>                                                                    
                                                    </div>
                                                    <div class="meta">
                                                        <strong>Imagen</strong>
                                                    </div>                                
                                                </a> 
                                                @endforeach
                                            </div>  
                                    </div>
                                    

                                <div class="panel-footer">                                   
                                   <a  href="{{URL::action('AdminProductosController@edit',$datos->id)}}" ><button class="btn btn-primary pull-right">Editar Datos</button></a> 
                                </div>
                                <br>
                                
</div>
@endsection