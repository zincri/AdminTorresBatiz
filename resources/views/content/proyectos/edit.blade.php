@extends('layouts.master') 
@section('content') 
{!!Form::model($proyecto,array('method'=>'PATCH','action'=>['AdminProyectosController@update',$proyecto->id],'files' => 'true'))!!} 
{{Form::token()}}

<div class="form-horizontal">
    <div class="panel panel-default">


        <div class="panel-body">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

            <div class="form-group {{$errors->has('tituloProyecto') ? 'has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Título del Proyecto</label>
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                        <input type="text" class="form-control" name="tituloProyecto" value="{{$proyecto->titulo}}" />
                    </div>
                    {!! $errors->first('tituloProyecto','<span class="help-block">:message</span>')!!}

                </div>
            </div>

            <div class="form-group {{$errors->has('descProyecto') ? 'has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Descripción del Proyecto</label>
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                        <textarea name="descProyecto" class="form-control" id="" cols="30" rows="10">{{$proyecto->descripcion}}</textarea>
                    </div>
                    {!! $errors->first('descProyecto','<span class="help-block">:message</span>')!!}

                </div>
            </div>

             <div class="form-group {{$errors->has('file') ? 'has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Imagen del Proyecto</label>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="file" name="file" id="file" class="file" accept="image/*" data-preview-file-type="any" /> 
                            {!! $errors->first('file','<span class="help-block">:message</span>')!!}
                        </div>
                    </div>
                </div>
            </div>






        </div>
        <div class="panel-footer">
            <button class="btn btn-primary pull-right" type="submit">Guardar</button>
        </div>



    </div>
</div>
{!!Form::close()!!} 
@endsection 
