@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
<h1>Añadir nuevo doctor</h1>
@stop

@section('content')
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet prefetch'
    href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

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

        {{--Añadir N_CMP--}}
        <div class="form-group">
            {!! Form::label('n_cmp', 'N° CMP') !!}
            {!! Form::text('n_cmp', null, ['class' => 'form-control','placeholder'=>'Número de CMP']) !!}
        </div>

        {{-- Seleccionar N°CMP --}}
        {!! Form::label('n_cmp', 'N° CMP') !!}<br>
        <div style="margin: 15px 20px" class="form-group">
            <div class="row">
                <!-- Multiple Item Picker -->
                <div class="card">
                    <select name="n_cmp" id="n_cmp" class="selectpicker show-menu-arrow" data-style="form-control"
                        data-live-search="true" multiple data-max-options="1" title="Buscar N° CMP">
                        @foreach ($DCMP as $doctores)
                        @foreach ($doctores as $doctor)
                        <option value="{{$doctor['CMP']}}"
                            data-tokens="{{" " . $doctor['ApellidoPaterno']. " " . $doctor['ApellidoMaterno']. " " . $doctor['Nombres']}}">
                            {{$doctor['CMP'].": ".$doctor['ApellidoPaterno']. " " . $doctor['ApellidoMaterno']. " " . $doctor['Nombres'] }}
                        </option>
                        @endforeach
                        @endforeach
                    </select>
                </div><!-- CARD -->
            </div><!-- ROW -->
        </div> <!-- FORM-GROUP -->


        {{-- Seleccionar Usuario --}}
        {!! Form::label('dni', 'DNI del usuario') !!}<br>
        <div style="margin: 15px 20px" class="form-group">
            <div class="row">
                <!-- Multiple Item Picker -->
                <div class="card">
                    <select name="dni" id="dni" class="selectpicker show-menu-arrow" data-style="form-control"
                        data-live-search="true" multiple data-max-options="1" title="Buscar Usuario">
                        @foreach ($profiles as $profile)
                        <option value="{{$profile->dni}}"
                            data-tokens="{{" " . $profile->apellido. " " . $profile->nombre. " " . $profile->dni . " "}}">
                            {{$profile->apellido. " " . $profile->nombre. ", DNI:" . $profile->dni}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!--.row-->
        </div>
        <!--.container-->






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


    <div class="form-group">

        {!! Form::submit('Crear', ['class' => ' btn btn-success']) !!}
    </div>
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
