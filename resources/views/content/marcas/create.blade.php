@extends('layouts.master')

@section('content')
{!!Form::open(array('url'=>'administrador/productos','method'=>'POST','autocomplete'=>'off','files' => 'true'))!!}
{{Form::token()}}
                <div class="form-horizontal">
                <div class="panel panel-default">
                                
                               
                                <div class="panel-body">                                                                        
                                    
                                    <div class="form-group {{$errors->has('nombreproducto') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Nombre de la marca</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="nombreproducto" value="{{old('nombreproducto')}}"/>
                                            </div>                                            
                                            {!! $errors->first('nombreproducto','<span class="help-block">:message</span>')!!}
                                            
                                        </div>
                                    </div>

                                    <div class="form-group {{$errors->has('categoriaproducto') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Categoria del producto</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select class="form-control" name="categoriaproducto">
                                            <option value=""> SELECCIONA UNA CATEGORIA </option>
                                                @foreach($combo as $item)
                                                    @if(old('categoriaproducto') == $item->id)
                                                        <option value="{{$item->id}}" selected>{{$item->nombre}}</option>
                                                    @else
                                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                    @endif
                                                @endforeach   
                                            </select>
                                            {!! $errors->first('categoriaproducto','<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>

                                    <!-- <div class="form-group {{$errors->has('descripcionlarga') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Descripcion larga</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="descripcionlarga">{{old('descripcionlarga')}}</textarea>
                                            {!! $errors->first('descripcionlarga','<span class="help-block">:message</span>')!!}
                                        </div>
                                        
                                    </div> -->

                                    <!-- <div class="form-group {{$errors->has('descripcioncorta') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Descripcion corta</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="descripcioncorta">{{old('descripcioncorta')}}</textarea>
                                            {!! $errors->first('descripcioncorta','<span class="help-block">:message</span>')!!}
                                        </div>
                                        
                                    </div> -->

                                    <div class="form-group {{$errors->has('stock') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Stock</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="stock" value="{{old('stock')}}"/>
                                            </div>                                            
                                            {!! $errors->first('stock','<span class="help-block">:message</span>')!!}
                                            
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