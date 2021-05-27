@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
<h1>Horario del Doc.
    @foreach ($doctors as $doc)
    {{$doc->name}}
    @endforeach

</h1>
@stop

@section('content')
<div class="card">

    <div class="card-header">
        @if (session('mensaje'))
        <div class="alert alert-danger">
            <strong>{{session('mensaje')}}</strong>
        </div>
        @endif
    </div>


    <div class="card-body">
        <table id="doctores" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID HORARIO</th>
                    <th>Especialidad</th>
                    <th>Fecha Programa</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doc)
                <tr>
                    <td>{{$doc->id}}</td>
                    <td>{{$doc->nombre}}</td>
                    <td>{{$doc->fecha_atencion}}</td>
                    <td>{{$doc->hora_inicio}}</td>
                    <td>{{$doc->hora_fin}}</td>
                    <td>@if ($doc->estado=0)
                        Disponible
                        @else
                        No disponible
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
<script>
    console.log('Hola!');
</script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('#doctores').DataTable(
        {
            "responsive":true,
            "auto-with":false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
</script>
@stop
