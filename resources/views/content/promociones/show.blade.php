@extends('layouts.master') @section('content')
<div class="panel-body">


    {!! $errors->first('erroregistro','
    <div class="alert alert-danger">
        <strong>Warning!</strong>Ocurrio un error, intentelo nuevamente por favor!
    </div>
    ')!!}
    <h2>{{$nombrePromocion->nombre}} - Productos Asociados</h2>
    <div class="table-responsive custom-table promocionesTable">
        <table class="table">
            <thead>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach($productos as $item)
                <tr>
                    <td class="imgContainer">
                        <figure><img src="{{ $item->imagen }}" alt=""></figure>
                    </td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->cantidadenpromocion }}</td>
                    <td><a href="" data-target="#message-box-danger-{{$item->id}}" data-toggle="modal"><button  title="Remover producto" class="btn btn-danger" ><i class="fa fa-trash-o"></i></button></a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>

@endsection