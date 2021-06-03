<x-app-layout>

    <div class="card-body">
        <div class="container py-8">
            <p class="text text-3xl" style="padding: 0px 10px 10px 75px">Seleccionar Horario</p>
            <table id="doctores" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        {{-- <th>ID HORARIO</th> --}}
                        <th>Fecha Programa</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                        <th>Estado</th>
                        <th>Elegir</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($doctor->schedules as $sc)
                    {!! Form::open(['method' => 'POST', 'route' => 'cita.reserva.store']) !!}
                    <tr>
                        {{-- <td>{{$sc->id}}</td> --}}
                        <td>{{$sc->fecha_atencion}}</td>
                        <td>{{$sc->hora_inicio}}</td>
                        <td>{{$sc->hora_fin}}</td>
                        <td>
                            @if ($sc->estado==0)
                            {!! Form::text('estado',"1", ['hidden','class' => 'form-control']) !!}
                            <span class="text-success"> Disponible </span>
                            @elseif ($sc->estado==1)
                            <span class="text-warning"> Ocupado </span>
                            @else
                            <span class="text-danger"> Terminado </span>
                            @endif
                        </td>
                        <td>
                            {!! Form::text('schedule_id', $sc->id, ['hidden', 'class' =>
                            'form-control','placeholder'=>'Número
                            de CMP']) !!}
                            {!! Form::text('user_id', Auth::user()->id, ['hidden','class' => 'form-control']) !!}
                            {!! Form::submit('Elegir', ['class' => 'btn btn-success']) !!}
                        </td>
                    </tr>
                    {!! Form::close() !!}
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
