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
            <table id="doctores" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>N_CMP</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th style="width:20px;text-align:center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                    <tr>
                        <td>{{$doctor->user->id}}</td>
                        <td>{{$doctor->n_cmp}}</td>
                        <td>{{$doctor->user->profile->nombre}}</td>
                        <td>{{$doctor->user->profile->apellido}}</td>
                        <td>{{$doctor->user->profile->dni}}</td>
                        <td style="display: flex;">
                            <a href="{{ route('admin.doctors.show', $doctor) }}" class="btn btn-warning" >Horario</a>
                            <a href="{{ route('admin.doctors.edit', $doctor) }}" class="btn btn-success" style="margin: 0px 0px 0px 5px;">Editar</a>
                            <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar" class="btn btn-danger" style="margin: 0px 0px 0px 5px;">
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@stop

@include('admin.doctors.partials.recursos')
