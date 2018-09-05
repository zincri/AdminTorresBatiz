@extends('layouts.master')

@section('content')
{!!Form::open(array('url'=>'administrador/categorias','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
                <div class="form-horizontal">
                <div class="panel panel-default">
                                
                               
                                <div class="panel-body">                                                                        
                                    
                                    <div class="form-group {{$errors->has('categoria') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Categoria</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="categoria" value="{{old('categoria')}}"/>
                                            </div>                                            
                                            {!! $errors->first('categoria','<span class="help-block">:message</span>')!!}
                                            
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