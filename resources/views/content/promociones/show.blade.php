@extends('layouts.master') @section('content')
<div class="panel-body">


    {!! $errors->first('erroregistro','
    <div class="alert alert-danger">
        <strong>Warning!</strong>Ocurrio un error, intentelo nuevamente por favor!
    </div>
    ')!!}
    <h2>{{$promocion[0]->Nombre}} - Productos Asociados</h2>
    <div class="table-responsive custom-table promocionesTable">
        <table class="table">
            <thead>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                
            </thead>
            <tbody>
                @foreach($datos as $item)
                <tr>
                    <td class="imgContainer">
                        <figure><img src="{{ $item->imagen }}" alt=""></figure>
                    </td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->cantidad }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
<!-- Aquí todo es nuevo, no lo marca por el commit de antes -->
</div>

@endsection