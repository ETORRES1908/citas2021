@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
    <h1>Editar Usuario ID: {{$user->id}}</h1>
    {{$user}}
@stop

@section('content')
    <div class="card">
        <div class="card-header">

            @if (session('mensaje'))
                <div class="alert alert-success">
                    <strong>{{session('mensaje')}}</strong>
                </div>
            @endif

            @if (count($errors) > 0)
            <div class="text-danger">

                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach

            </div>
            @endif

        </div>
        <div class="card-body">
            
            {!! Form::open(array('route'=>array('admin.users.update',$user->id), 'method'=>'PUT')) !!}

                <div class="form-group">
                        
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre') !!}
                            {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('apellido', 'Apellidos') !!}
                            {!! Form::text('apellido', $user->apellido, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Correo') !!}
                            {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('dni', 'DNI') !!}
                            {!! Form::text('dni', $user->dni, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_nac', 'Fecha de Nacimiento') !!}
                            {!! Form::date('fecha_nac', $user->fecha_nac, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('edad', 'Edad') !!}
                            {!! Form::text('edad', $user->edad, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('sexo', 'Sexo') !!}
                            {!! Form::select('sexo',array('m'=>'Masculino','f'=>'Femenino'), $user->sexo, ['class' => 'form-control']) !!}
                        </div>

                </div>

                <div class="form-group">
                    {!! Form::submit("Actualizar", ['class' => 'btn btn-primary']) !!}
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
