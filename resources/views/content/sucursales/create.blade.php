@extends('layouts.master') @section('content') 
{!!Form::open(array('url'=>'administrador/sucursales','method'=>'POST', 'id'=>'sucursalesForm','autocomplete'=>'off','files' => 'true'))!!} 
{{Form::token()}}

<div class="form-horizontal">
    <div class="panel panel-default">


        <div class="panel-body">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            
            <div class="form-group {{$errors->has('nombreSucursal') ? 'has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Nombre de la sucursal</label>
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                        <input type="text" class="form-control" name="nombreSucursal" value="{{old('nombreSucursal')}}" />
                    </div>
                    {!! $errors->first('nombreSucursal','<span class="help-block">:message</span>')!!}

                </div>
            </div>

            <div class="form-group {{$errors->has('direccionSucursal') ? 'has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Dirección de la sucursal</label>
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                        <input type="text" class="form-control" name="direccionSucursal" value="{{old('direccionSucursal')}}" />
                    </div>
                    {!! $errors->first('direccionSucursal','<span class="help-block">:message</span>')!!}

                </div>
            </div>

            <div class="form-group {{$errors->has('emailSucursal') ? 'has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Correo de la sucursal</label>
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                        <input type="text" class="form-control" name="emailSucursal" value="{{old('emailSucursal')}}" />
                    </div>
                    {!! $errors->first('emailSucursal','<span class="help-block">:message</span>')!!}

                </div>
            </div>

            <div class="form-group {{$errors->has('urlGoogleMaps') ? 'has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Dirección de Google Maps</label>
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                        <input type="text" class="form-control" name="urlGoogleMaps" value="{{old('urlGoogleMaps')}}" />
                    </div>
                    {!! $errors->first('urlGoogleMaps','<span class="help-block">:message</span>')!!}

                </div>
            </div>

            <div class="form-group {{$errors->has('telefonoPrincipal') ? 'has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Teléfono Principal</label>
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                        <input type="text" class="form-control" name="telefonoPrincipal" value="{{old('telefonoPrincipal')}}" />
                    </div>
                    {!! $errors->first('telefonoPrincipal','<span class="help-block">:message</span>')!!}

                </div>
            </div>
            <div class="secondPhonesContainer">

            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="addPhones"><i class="fa fa-plus-circle"></i> Añadir otro teléfono</button>
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
@push('addElementsToForm')
<script type="text/javascript" src="{{ asset('js/addElementsToForm.js') }}"></script>
@endpush