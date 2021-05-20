@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
    <h1>Menu  de Administracion </h1>
@stop

@section('content')
    <p>Bienvenido al panel de administracion.</p>
    <div class="card">
        <div class="card-header">
            <div class="alert alert-success"> Hola </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Emma</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop