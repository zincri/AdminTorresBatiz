@extends('layouts.master') 
@section('content') 
{!!Form::model($info,array('method'=>'PATCH','action'=>['AdminASCController@update',$info->id],'files' => 'true'))!!} 
{{Form::token()}}

<div class="form-horizontal">
    <div class="panel panel-default">


        <div class="panel-body">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

            <div class="form-group {{$errors->has('tituloInfo') ? 'has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Título</label>
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                        <input type="text" class="form-control" name="tituloInfo" value="{{$info->titulo}}" />
                    </div>
                    {!! $errors->first('tituloInfo','<span class="help-block">:message</span>')!!}

                </div>
            </div>

            <div class="form-group {{$errors->has('descInfo') ? 'has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Descripción</label>
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                        <textarea name="descInfo" class="form-control" id="" cols="30" rows="10">{{$info->descripcion}}</textarea>
                    </div>
                    {!! $errors->first('descInfo','<span class="help-block">:message</span>')!!}

                </div>
            </div>

            @if($info->pagina != "arrendamiento")
             <div class="form-group {{$errors->has('file') ? 'has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Imagen</label>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="file" name="file" id="file" class="file" accept="image/*" data-preview-file-type="any" /> 
                            {!! $errors->first('file','<span class="help-block">:message</span>')!!}
                        </div>
                    </div>
                </div>
            </div>
            @endif






        </div>
        <div class="panel-footer">
            <button class="btn btn-primary pull-right" type="submit">Guardar</button>
        </div>



    </div>
</div>
{!!Form::close()!!} 
@endsection 
