@extends('layouts.master')

@section('content')
{!!Form::model($datos,array('method'=>'PATCH','route'=>['listaservicios.update',$datos->id]))!!}
{{Form::token()}}
                <div class="form-horizontal">
                <div class="panel panel-default">
                                <div class="panel-body">                                                                        
                                    
                                    <div class="form-group {{$errors->has('servicio') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Servicio</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="servicio" value="{{$datos->servicio}}"/>
                                            </div>                                            
                                            {!! $errors->first('servicio','<span class="help-block">:message</span>')!!}
                                            
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