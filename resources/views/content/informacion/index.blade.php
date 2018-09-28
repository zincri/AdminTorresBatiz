@extends('layouts.master') @section('content')
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
            <h3>Título Nosotros</h3>
            <p>{{ $datos->titulonosotros }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Descripción</h3>
            <p>{{ $datos->descripcion }}</p>
        </div>
        <div class="col-md-6">
            <h3>Email</h3>
            <p>{{ $datos->email }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Dirección</h3>
            <p>{{ $datos->direccion }}</p>
        </div>
        <div class="col-md-6">
            <h3>Teléfono</h3>
            <p>{{ $datos->telefono }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Misión</h3>
            <p>{{ $datos->mision }}</p>
        </div>
        <div class="col-md-6">
            <h3>Visión</h3>
            <p>{{ $datos->vision }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Objetivos</h3>
            <p>{{ $datos->objetivos }}</p>
        </div>
        <div class="col-md-6">
            <h3>Vídeo Principal</h3>
            <iframe width="80%" height="315" src="{{ $datos->videoprincipal }}" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Título de primera reseña</h3>
            <p>{{ $datos->titulohistoria }}</p>
        </div>
        <div class="col-md-6">
            <h3>Texto de primera reseña</h3>
            <p>{{ $datos->textohistoria }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Título de segunda reseña</h3>
            <p>{{ $datos->tituloresena }}</p>
        </div>
        <div class="col-md-6">
            <h3>Texto de segunda reseña</h3>
            <p>{{ $datos->textoresena }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 imgInfoGeneral">
            <h3>Imagen Nosotros</h3>
            
                <img src="{{ $datos->imagennosotros }}" alt="">
            
        </div>
        <div class="col-md-6 imgInfoGeneral">
            <h3>Imagen de banner secundario</h3>
            
                <img src="{{ $datos->imagenbannersecundario }}" alt="">
            
        </div>
    </div>
    <div class="panel-footer">
        <a href="{{URL::action('InformacionController@edit',$datos->id)}}"><button class="btn btn-primary pull-right">Editar Datos</button></a>
    </div>


    @endsection