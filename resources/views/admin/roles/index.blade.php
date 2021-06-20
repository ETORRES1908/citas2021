@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
    <h1>Menu de Roles </h1>
@stop

@section('content')

<div class="card">

@can('admin.roles.create')


    <div class="card-header">
        @if (session('mensaje'))
        <div class="alert alert-danger">
            <strong>{{session('mensaje')}}</strong>
        </div>
        @endif
    </div>
@endcan
    <div class="card-body">
        <table id="roles" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th style="width:20px;text-align:center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td style="display: flex;">


                        @can('admin.roles.edit')
                        <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-success"
                            style="margin: 0px 0px 0px 5px;">Editar</a>
                        @endcan

                        @can('admin.roles.destroy')
                        <form action="{{ route('admin.roles.destroy', $role) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="btn btn-danger"
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

@include('admin.roles.partials.recursos')
