@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
    <h1>Menu  de Usuarios </h1>
@stop

@section('content')
    <div class="card">

        <div class="card-header">
            @if (session('msg'))
                <div class="alert alert-danger">
                    <strong>{{session('msg')}}</strong>
                </div>
            @endif

            {{-- <a href="{{ route('admin.doctors.create')}}" class="btn btn-primary"> Añadir Doctor</a> --}}

        </div>

        <div class="card-body">
            <table id="usuarios" class="table table-striped table-bordered" style="width:100%">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Email</th>
                        
                        <th style="width:2px;text-align:center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->profile->nombre}}</td>
                        <td>{{$user->profile->apellido}}</td>
                        <td>{{$user->profile->dni}}</td>
                        <td>{{$user->email}}</td>
                        
                        <td style="display:flex ">
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-success">Editar</a>
                    
                            <form action="{{ route('admin.users.destroy', $user) }}" method="post">
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
    $('#usuarios').DataTable(
        {
            "responsive":true,
            "auto-with":false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
</script>
@stop
