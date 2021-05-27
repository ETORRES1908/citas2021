@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
    <h1>Añadir nuevo doctor</h1>
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

        </div>
        <div class="card-body">

            {!! Form::open(['method' => 'POST', 'route' => 'admin.doctors.store']) !!}

            <div class="form-group">
                <div class="form-group">
                    {!! Form::label('n_cmp', 'N_CMP') !!}
                    {!! Form::text('n_cmp', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('user_id', 'ID del Usuario  ') !!}
                    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('speciality', 'Especialidad') !!}
                    {!! Form::text('speciality', null, ['class' => 'form-control']) !!}
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
    <script> console.log('Hola!'); </script>
@stop
