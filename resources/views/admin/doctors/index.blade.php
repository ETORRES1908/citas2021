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
                        <td>{{$doctor->id}}</td>
                        <td>{{$doctor->n_cmp}}</td>
                        <td>{{$doctor->user->profile->nombre}}</td>
                        <td>{{$doctor->user->profile->apellido}}</td>
                        <td>{{$doctor->user->profile->dni}}</td>
                        <td style="display: flex;">
                            <a href="{{ route('admin.doctors.show', $doctor->id) }}" class="btn btn-warning" >Horario</a>
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
