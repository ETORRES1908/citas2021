 @extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
    <h1>Menu  de Doctores </h1>
@stop

@section('content')
    <div class="card">

        <div class="card-header">
            @if (session('mensaje'))
                <div class="alert alert-danger">
                    <strong>{{session('mensaje')}}</strong>
                </div>
            @endif

            <a href="{{ route('admin.doctors.create')}}" class="btn btn-primary"> Añadir Doctor</a>

        </div>


        <div class="card-body">
            <table class="table table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>N_CMP</th>
                        <th>Nombre</th>
                        <th>Especilidades</th>
                        <th style="text-align:center" colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                    <tr>
                        <td>{{$doctor->id}}</td>
                        <td>{{$doctor->n_cmp}}</td>
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->nombre}}</td>
                        <td></td>
                        <td style="display: flex; justify-content: space-between">
                            <a href="{{ route('admin.doctors.show', $doctor) }}" class="btn btn-warning" >Horario</a>
                            <a href="{{ route('admin.doctors.edit', $doctor) }}" class="btn btn-success">Editar</a>
                            <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="post">
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
