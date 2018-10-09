@extends('layouts.master')

@section('content')
{!!Form::model($datos,array('method'=>'PATCH','action'=>['CategoriasController@update',$datos->id],'files' => 'true'))!!} 
{{Form::token()}}
                <div class="form-horizontal">
                <div class="panel panel-default">
                                <div class="panel-body">                                                                        
                                    
                                    <div class="form-group {{$errors->has('categoria') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Categoria</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" class="form-control" name="categoria" value="{{$datos->nombre}}"/>
                                            </div>                                            
                                            {!! $errors->first('categoria','<span class="help-block">:message</span>')!!}
                                            
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

                                    <div class="form-group {{$errors->has('bprioridad') ? 'has-error':''}}">
                                        <label class="col-md-3 col-xs-12 control-label">Prioridad</label>
                                        <div class="col-md-4">
                                            <div class="distance-title"> Barra de prioridad de la categoria: <span></span></div>
                                            <div class="distance-radius-wrap fl-wrap">
                                                <input id="bprioridad" name="bprioridad" class="distance-radius rangeslider--horizontal" onchange="updateTextInput(this.value);" type="range" min="1" max="100"
                                                    step="1" value="{{$datos->prioridad}}" data-title="Radius around selected destination">
                                                {!! $errors->first('bprioridad','<span class="help-block">:message</span>')!!}
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <span style="font-size: 260%;" class="porcentaje">{{$datos->prioridad}}%</span>
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

@push('porcentaje')

<script>

function updateTextInput(value){
    $(".porcentaje").text(value + "%");
}
</script>

@endpush