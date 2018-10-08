@extends('layouts.master')

@section('content')
{!!Form::open(array('url'=>'administrador/listavideos','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
                <div class="form-horizontal">
                <div class="panel panel-default">
                                
                               
                                <div class="panel-body">                                                                        
                                    
                                    <div class="form-group {{$errors->has('video') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Nombre video</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="video" value="{{old('video')}}"/>
                                            </div>                                            
                                            {!! $errors->first('video','<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="form-group {{$errors->has('url') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Url del video</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="url" value="{{old('url')}}"/>
                                            </div>                                            
                                            {!! $errors->first('url','<span class="help-block">:message</span>')!!}
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