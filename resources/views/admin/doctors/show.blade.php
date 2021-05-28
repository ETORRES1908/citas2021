@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
<h1>Horario del Doc. {{$user->name}}</h1>
@stop

@section('content')
<div class="card">

    <div class="card-header">
        @if (session('mensaje'))
        <div class="alert alert-danger">
            <strong>{{session('mensaje')}}</strong>
        </div>
        @endif
        <h5>Especialidad : </h5>
        <span class="text-success">
            @foreach ($speciality as $specialities)
                @foreach ($specialities as $sp)
                {{$sp->nombre}}
                @endforeach
            @endforeach
        </span>
    </div>

    <div class="card-body">
        <table id="doctores" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID HORARIO</th>
                    <th>Fecha Programa</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                @foreach ($doctor["schedules"] as $schedule)

                <tr>
                    <td>{{$schedule->id}}</td>
                    <td>{{$schedule->fecha_atencion}}</td>
                    <td>{{$schedule->hora_inicio}}</td>
                    <td>{{$schedule->hora_fin}}</td>
                    <td>
                        @if ($schedule->estado=0)
                        <span class="text-success">Disponible</span>
                        @else
                        <span class="text-danger">Ocupado</span>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{ route('admin.doctors.index') }}" class="btn btn-warning"> Volver </a>
    </div>

</div>
@stop

@include('admin.doctors.partials.recursos')
