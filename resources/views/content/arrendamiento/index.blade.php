@extends('layouts.master')

@section('content')
{!! $errors->first('erroregistro','
                    <div class="alert alert-danger">
                        <strong>Warning!</strong>Ocurrio un error, intentelo nuevamente por favor!
                    </div>
')!!}
<div class="panel-body table-responsive">
        <table class="table datatable tableMensajes">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Fecha</th>
                    <th>Visto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos as $item)
                <tr class="clickableRow" data-href="{{ URL::action('AdminArrendamientoController@show',$item->id) }}">
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->empresa}}</td>
                    <td>{{$item->fecha_ins}}</td>
                    @if ($item->visto == 0)
                        <td>Sin Leer <span style="color:red" class="fa fa-eye"></span></td>
                    @else
                        <td>Leído <span style="color:green" class="fa fa-eye"></span></td>
                    @endif
                </tr>
                @endforeach
    
            </tbody>
        </table>
    
        <!-- END DEFAULT DATATABLE -->
    </div>

@endsection 

@push('clickableRow')
<script>
    $(document).ready(()=>{
        $(document).on("click",".clickableRow",function() {
        window.location = $(this).data("href");
        });
    });
    
</script>
@endpush