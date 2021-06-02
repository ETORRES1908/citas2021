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

        @if (session('mensaje'))
                <div class="alert alert-warning">
                    <strong>{{session('mensaje')}}</strong>
                </div>
        @endif

    </div>
    <div class="card-body">

        {!! Form::open(['method' => 'POST', 'route' => 'admin.doctors.store']) !!}

        <div class="form-group">

            {{-- Añadir N_CMP --}}
            <div class="form-group">
                {!! Form::label('n_cmp', 'N° CMP') !!}
                {!! Form::text('n_cmp', null, ['class' => 'form-control','placeholder'=>'Número de CMP']) !!}
            </div>


            {{-- Seleccionar Usuario --}}
            <div class="form-group">
                {!! Form::label('dni', 'DNI del usuario') !!}<br>
                {!! Form::text('dni', null, ['class' => 'form-control','placeholder'=>'DNI usuario']) !!}
            </div>

            {{-- Seleccionar Especialidades--}}
            <div class=" form-group">
                {!! Form::label('specialities', 'Especialidades') !!}<br>
                @foreach ($specialities as $speciality)
                <label for="especialidad">
                    {!! Form::checkbox('specialities[]', $speciality->id, null, ['class' => 'mr-1']) !!}
                    {{$speciality->nombre}}
                </label><br>
                @endforeach
            </div>
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
