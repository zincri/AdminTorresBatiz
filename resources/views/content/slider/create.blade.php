@extends('layouts.master')

@section('content')
{!!Form::open(array('url'=>'administrador/slider','method'=>'POST','autocomplete'=>'off','files' => 'true'))!!}
{{Form::token()}}
                <div class="form-horizontal">
                <div class="panel panel-default">
                                
                               
                                <div class="panel-body">                                                                        
                                    
                                    <div class="form-group {{$errors->has('titulo') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Titulo</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}"/>
                                            </div>                                            
                                            {!! $errors->first('titulo','<span class="help-block">:message</span>')!!}
                                            
                                        </div>
                                    </div>
                                    <div class="form-group {{$errors->has('tituloglobo') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Titulo de Globo</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="tituloglobo" value="{{old('tituloglobo')}}"/>
                                            </div>                                            
                                            {!! $errors->first('tituloglobo','<span class="help-block">:message</span>')!!}
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="form-group {{$errors->has('file') ? 'has-error':''}}">

                                        <label class="col-md-3 col-xs-12 control-label">Imagen</label>
                                        <div class="col-md-6 col-xs-12">                               
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input type="file"  name="file" id="file"  class="file" accept="image/*" data-preview-file-type="any"/>
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