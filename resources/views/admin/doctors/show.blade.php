@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
<h1>Horario del Doc. {{$doctor->user->name}}</h1>
@stop

@section('content')
<div class="card">

    <div class="card-header">
        @if (session('mensaje'))
        <div class="alert alert-danger">
            <strong>{{session('mensaje')}}</strong>
        </div>
        @endif
        <h5>Especialidad(es) : </h5>
        <span class="text-secondary">

            @foreach ($doctor->specialities as $esp)
            <li>{{$esp->nombre}} </li>
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

                @foreach ($doctor->schedules as $sc)
                <tr>
                    <td>{{$sc->id}}</td>
                    <td>{{$sc->fecha_atencion}}</td>
                    <td>{{$sc->hora_inicio}}</td>
                    <td>{{$sc->hora_fin}}</td>
                    <td>
                        @if ($sc->estado=0)
                        <span class="text-success"> Disponible </span>
                        @elseif ($sc->estado=1)
                        <span class="text-warning"> Ocupado </span>
                        @else
                        <span class="text-danger"> Terminado </span>
                        @endif
                    </td>
                </tr>
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
