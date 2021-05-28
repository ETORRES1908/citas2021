@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
<h1>Editar Doctor ID: {{$doctor->user->name}}</h1>
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
        {!! Form::model($doctor, ['route' => ['admin.doctors.update', $doctor], 'method' => 'PUT']) !!}

        <div class="form-group">
            <div class="form-group">
                {!! Form::label('n_cmp', 'N_CMP') !!}
                {!! Form::text('n_cmp', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', $doctor->user->profile->nombre, ['class' => 'form-control']) !!}
            </div>
        </div>
        
        <div class="form-group">
            
            @foreach ($specialities as $speciality)
                
            
            <label for="especialidad">
            {!! Form::checkbox('specialities[]', $speciality->id, $doctor->specialities, ['class' => 'mr-1']) !!} {{$speciality->nombre}}
            </label>    
            @endforeach
            {{-- 
                1 => 1
                2 => 2
                3 => 3
            --}}
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
    <script>
        console.log('Hola!');
    </script>
    @stop
