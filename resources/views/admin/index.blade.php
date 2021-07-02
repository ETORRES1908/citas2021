@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
<h1>Menu de Administracion </h1>
@stop

@section('content')
<p>Bienvenido al panel de administracion.</p>
<table class="table table-hover">
    <thead>
        <tr>
            <th>CMP</th>
            <th>Nombres</th>
            <th>Apellidos</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ArrayD as $doctores)
            @foreach ($doctores as $doctorAPI)
            <tr>
                <td>{{$doctorAPI['CMP']}}</td>
                <td>{{$doctorAPI['Nombres']}}</td>
                <td>{{$doctorAPI['ApellidoPaterno']}} {{$doctorAPI['ApellidoMaterno']}}</td>
                <form action="" method="post"></form>
            </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop
