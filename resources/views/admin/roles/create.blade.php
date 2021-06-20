@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
    <h1>Añadir nuevo rol</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">

        @if (count($errors) > 0)
        <div class="text-danger">

            @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach

        </div>
        @endif

        @if (session('mensaje'))
                <div class="alert alert-warning">
                    <strong>{{session('mensaje')}}</strong>
                </div>
        @endif

    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'admin.roles.store', 'method' => 'POST']) !!}

        <div class="form-group" style="margin: 20px 0px ">
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>


        <div class="form-group" style="margin: 20px 0px">
           <br>
            <h3>Lista de Permisos</h3>

            @foreach ($permissions as $permission)
            <div>
            <label>
                {!! Form::checkbox('permissions[]',
                $permission->id, null, ['class' => 'mr-1']) !!}
                {{$permission->description}}
            </label>
            @endforeach
            </div>
    </div>

    <div class="form-group">

        {!! Form::submit('Crear', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}

</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hola!');
</script>
@stop
