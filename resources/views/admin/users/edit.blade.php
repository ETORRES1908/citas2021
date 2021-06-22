@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
    <h1>Editar a {{$user->profile->nombre}}</h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">

            @if (session('msg'))
                <div class="alert alert-success">
                    <strong>{{session('msg')}}</strong>
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


            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}

                <div class="form-group">

                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', $user->profile->nombre, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('apellido', 'Apellidos') !!}
                            {!! Form::text('apellido', $user->profile->apellido, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Correo') !!}
                            {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('dni', 'DNI') !!}
                            {!! Form::text('dni', $user->profile->dni, ['class' => 'form-control','disabled']) !!}

                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_nac', 'Fecha de Nacimiento') !!}
                            {!! Form::date('fecha_nac', $user->profile->fecha_nac, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('edad', 'Edad') !!}
                            {!! Form::text('edad', $user->profile->edad, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('sexo', 'Sexo') !!}
                            {!! Form::select('sexo',array('m'=>'Masculino','f'=>'Femenino'), $user->profile->sexo, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('roles', 'Roles') !!}
                            <br>
                            @foreach ($roles as $role)
                                    <label>
                                        {!! Form::checkbox('roles[]',$role->id,null,['class' => 'mr-1'])!!} {{$role->name}}
                                    </label>
                            @endforeach
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
