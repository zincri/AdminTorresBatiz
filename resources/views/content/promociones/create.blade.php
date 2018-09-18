@extends('layouts.master') @section('content') 
{!!Form::open(array('url'=>'administrador/promociones','method'=>'POST', 'id'=>'promoForm','autocomplete'=>'off','files' => 'true'))!!} 
{{Form::token()}}

<div class="form-horizontal">
    <div class="panel panel-default">


        <div class="panel-body">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            
            <div class="form-group {{$errors->has('nombrePromocion') ? 'has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Nombre de la promoción</label>
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                        <input type="text" class="form-control" name="nombrePromocion" value="{{old('nombrePromocion')}}" />
                    </div>
                    {!! $errors->first('nombrePromocion','<span class="help-block">:message</span>')!!}

                </div>
            </div>

            <div class="form-group {{$errors->has('file') ? 'has-error':''}}">
                <label class="col-md-3 col-xs-12 control-label">Imagen de promoción</label>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="file" name="file" id="file" class="file" accept="image/*" data-preview-file-type="any" /> 
                            {!! $errors->first('file','<span class="help-block">:message</span>')!!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <!-- Tabla de consulta de productos -->
                    <div class="table-responsive">
                        <table class="table datatable custom-table">
                            <thead>
                                <th class="dontShow">ID</th>
                                <th>Nombre del producto</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach($productos as $item)
                                <tr>
                                    <td class="dontShow">{{ $item->id }}</td>
                                    <td>{{ $item->nombre }}</td>
                                    <td><button type="button" class="addProduct"><i class="fa fa-plus"></i></button></td>
                                </tr>
                                @endforeach
                               
                            </tbody>
    
                         </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Tabla de elegidos por el cliente -->
                    <div class="table-responsive">
                        <table class="table addedProducts custom-table">
                            <thead>
                                <th class="dontShow">ID</th>
                                <th>Productos elegidos</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                <!-- Se insertan las filas desde jquery addProductsToTable -->
                            </tbody>
    
                         </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="panel-footer">
            <button class="btn btn-primary pull-right" type="submit">Guardar</button>
        </div>
        
            <button class="demo" type="button">Ver array</button>
        

    </div>
</div>
{!!Form::close()!!} 
@endsection

@push('addProductsToPromo')
<script type="text/javascript" src="{{ asset('js/addProductsToTable.js') }}"></script>

@endpush