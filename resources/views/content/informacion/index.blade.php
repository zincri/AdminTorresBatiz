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
            <div class="row">
                <div class="col-md-12">
                    <h3>Título Nosotros</h3>
                    <input class="form-control" type="text" readonly value="{{ $datos->titulonosotros }}" placeholder="No se ha asignado ningún título">
                </div>
                <div class="col-md-12">
                    <h3>Descripción</h3>
                    <textarea rows="5" class="form-control" name="descripcion" readonly>{{ $datos->descripcion }}</textarea>
                </div>
                <div class="col-md-12">
                    <h3>Email</h3>
                    <input type="email" readonly class="form-control" value="{{ $datos->email }}">
                </div>
                <div class="col-md-12">
                    <h3>Dirección</h3>
                    <input readonly class="form-control" type="text" value="{{ $datos->direccion }}">
                </div>
                <div class="col-md-12">
                    <h3>Teléfono</h3>
                    <input readonly type="text" class="form-control" value="{{ $datos->telefono }}">
                </div>
                <div class="col-md-12">
                    <h3>Misión</h3>
                    <textarea rows="5" readonly name="mision" id="mision" class="form-control">{{ $datos->mision }}</textarea>
                </div>
                <div class="col-md-12">
                    <h3>Visión</h3>
                    <textarea rows="5" readonly name="vision" id="vision" class="form-control">{{ $datos->vision }}</textarea>
                </div>
                <div class="col-md-12">
                    <h3>Objetivos</h3>
                    <textarea rows="5" class="form-control" readonly name="objetivos" id="objetivos">{{ $datos->objetivos }}</textarea>
                </div>
                <div class="col-md-12">
                    <h3>Título de primera reseña</h3>
                    <input type="text" value="{{ $datos->titulohistoria }}" class="form-control" readonly>
                </div>
                <div class="col-md-12">
                    <h3>Texto de primera reseña</h3>
                    <textarea rows="5" readonly name="textohistoria" id="textohistoria" class="form-control">{{ $datos->textohistoria }}</textarea>
                </div>
                <div class="col-md-12">
                    <h3>Título de segunda reseña</h3>
                    <input readonly type="text" class="form-control" value="{{ $datos->tituloresena }}">
                </div>
                <div class="col-md-12">
                    <h3>Texto de segunda reseña</h3>
                    <textarea readonly rows="5" name="textoresena" id="textoresena" class="form-control">{{ $datos->textoresena }}</textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h3>Vídeo Principal</h3>
                    <iframe width="100%" height="315" src="{{ $datos->videoprincipal }}" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="col-md-12 imgInfoGeneral">
                    <h3>Imagen Nosotros</h3>
                    <img src="{{ $datos->imagennosotros }}" alt="No se ha asignado una imagen">
                </div>
                <div class="col-md-12 imgInfoGeneral">
                    <h3>Imagen de banner secundario</h3>
                    <img src="{{ $datos->imagenbannersecundario }}" alt="No se ha asignado una imagen">
                </div>
            </div>
        </div>
    </div>
   
    <div class="panel-footer">
        <a href="{{URL::action('InformacionController@edit',$datos->id)}}"><button class="btn btn-primary pull-right">Editar Datos</button></a>
    </div>


    @endsection