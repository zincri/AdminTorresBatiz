@extends('layouts.master')

@section('content')
                
                <div class="form-horizontal">
                <div class="panel panel-default">
                                
                                <div class="panel-body">                                                                        
                                    
                                {!! Form::open(array('url' => '/administrador/informacion','autocomplete'=>'off','method'=>'POST')) !!}
                                {{Form::token()}}
                                    <div class="form-group {{$errors->has('direccion') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Direccion</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="direccion" value="{{$datos->direccion}}"/>
                                            </div>                                            
                                            {!! $errors->first('direccion','<span class="help-block">:message</span>')!!}
                                            
                                        </div>
                                    </div>
                                    <div class="form-group {{$errors->has('email') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Email</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span>@</span></span>
                                                <input type="text" class="form-control" name="email" value="{{$datos->email}}"/>
                                            </div>                                            
                                            {!! $errors->first('email','<span class="help-block">:message</span>')!!}
                                            
                                        </div>
                                    </div>
                                    <div class="form-group {{$errors->has('telefono') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Telefono</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                                <input type="text" class="form-control" name="telefono" value="{{$datos->telefono}}"/>
                                            </div>                                            
                                            {!! $errors->first('telefono','<span class="help-block">:message</span>')!!}
                                            
                                        </div>
                                    </div>             
                                    
                                    <div class="form-group {{$errors->has('descripcion') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Descripcion</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="descripcion">{{$datos->descripcion}}</textarea>
                                            {!! $errors->first('descripcion','<span class="help-block">:message</span>')!!}
                                        </div>
                                        
                                    </div>
<!-- ################################################################################################################################################ -->

                                          
                                    
                                    <div class="form-group {{$errors->has('mision') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Mision</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="mision">{{$datos->mision}}</textarea>
                                            {!! $errors->first('mision','<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="form-group {{$errors->has('vision') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Vision</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="vision">{{$datos->vision}}</textarea>
                                            {!! $errors->first('vision','<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="form-group {{$errors->has('objetivos') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Objetivos</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="objetivos">{{$datos->objetivos}}</textarea>
                                            {!! $errors->first('objetivos','<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="form-group {{$errors->has('textoresena') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Reseña</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="textoresena">{{$datos->textoresena}}</textarea>
                                            {!! $errors->first('textoresena','<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="form-group {{$errors->has('videoprincipal') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Video principal</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-eye"></span></span>
                                                <input type="text" class="form-control" name="videoprincipal" value="{{$datos->videoprincipal}}"/>
                                            </div>                                            
                                            {!! $errors->first('videoprincipal','<span class="help-block">:message</span>')!!}
                                            
                                        </div>
                                    </div>
                                    

                            </div>
                                <div class="panel-footer">                                   
                                    <button class="btn btn-primary pull-right" type="submit">Guardar</button>
                                </div>
                            {!!Form::close()!!}
                            

                </div>
                </div>
                

                

@endsection