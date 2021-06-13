@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
    <h1>Crear una Especialidad</h1>
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

            {!! Form::open(['method' => 'POST', 'route' => 'admin.specialities.store']) !!}

            <div class="form-group">
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripcion') !!}
                    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('color', 'Color') !!}
                    {!!  Form::select('Color', ['red' => 'red', 'blue' => 'blue','indigo'=>'indigo','green' => 'green','gray'=>'gray'],['class' => 'form-control']); !!}
                    'color',['red','blue','indigo','green','gray']
                    {{-- {!! Form::select('color', null, ['class' => 'form-control']) !!} --}}
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
