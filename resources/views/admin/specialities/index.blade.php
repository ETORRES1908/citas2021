@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
    <h1>Menu  de Especialidades </h1>
@stop

@section('content')
    <div class="card">

        <div class="card-header">
            @if (session('mensaje'))
                <div class="alert alert-danger">
                    <strong>{{session('mensaje')}}</strong>
                </div>
            @endif

            <a href="{{ route('admin.specialities.create')}}" class="btn btn-primary"> Crear Especialidad</a>

        </div>


        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th style="text-align:center" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($specialities as $speciality)
                    <tr>
                        <td>{{$speciality->id}}</td>
                        <td>{{$speciality->nombre}}</td>
                        <td>{{$speciality->descripcion}}</td>
                        <td width="10px"> <a href="{{ route('admin.specialities.edit', $speciality) }}" class="btn btn-success">Editar</a> </td>
                        <td width="10px">
                            <form action="{{ route('admin.specialities.destroy', $speciality) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar" class="btn btn-danger">
                            </form>
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
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop