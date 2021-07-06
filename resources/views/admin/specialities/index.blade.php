@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
<h1>Menu de Especialidades </h1>
@stop

@section('content')
<div class="card">

    @can('admin.specialities.create')
    <div class="card-header">
        <a href="{{ route('admin.specialities.create')}}" class="btn btn-primary"> Crear Especialidad</a>
    </div>
    @endcan

    <div class="card-body">
        <table id="especialidades" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Color</th>
                    <th style="width:20px;text-align:center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($specialities as $speciality)
                <tr>
                    <td>{{$speciality->id}}</td>
                    <td>{{$speciality->nombre}}</td>
                    <td>{{$speciality->descripcion}}</td>
                    <td>
                        <p style="background:{{$speciality->color}}; color:white; font-weight:bold; padding:15px;"></p>
                    </td>
                    <td style="display: flex">
                        @can('admin.specialities.edit')
                        {{-- Editar --}}
                        <a href="{{ route('admin.specialities.edit', $speciality) }}" class="btn btn-success">Editar</a>
                        @endcan


                        {{-- Eliminar --}}
                        @can('admin.specialities.destroy',)
                        <form action="{{ route('admin.specialities.destroy', $speciality) }}" method="post"
                            class="formulario-eliminar">
                            @csrf
                            @method('DELETE')
                            <input type="submit" id="delete" value="Eliminar" class="btn btn-danger"
                                style="margin: 0px 0px 0px 5px;">
                        </form>
                        @endcan

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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    /* DATATABLE */
    $('#especialidades').DataTable(
        {
            "responsive":true,
            "auto-with":false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    /* FORMULARIO ELIMINAR ESPECIALIDAD */
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
            Swal.fire({
            title: '¿Estas seguro?',
            text: "Se eliminaran todos los registros relacionados a esta información(citas, horarios, doctores, etc). Esta acción es irreversible.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, estoy de acuerdo!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
    });
</script>
{{-- MENSAJE DESPUES DE ELIMINAR --}}
@if (session("mensaje")=="ok")
<script>
    Swal.fire(
                 'Eliminado!',
                 'Los registros se eliminaron correctamente.',
                 'success'
                 )
</script>
@endif
@stop
