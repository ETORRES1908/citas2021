<x-app-layout>

        <div class="card-body">
            <div class="container py-8">
                <p class="text text-3xl" style="padding: 0px 10px 10px 75px">Citas Reservadas</p>
                <table id="tcitas" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Fecha</th>
                            <th>Hora Inicio</th>
                            <th>Hora Fin</th>
                            <th>Especialidad</th>
                            <th>Doctor</th>
                            <th>Estado</th>
                            <th style="width:20px;text-align:center">Cancelar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($citas as $meeting)
                        <tr>
                            <td>{{$meeting->id}}</td>
                            <td>{{$meeting->schedule->fecha_atencion}}</td>
                            <td>{{$meeting->schedule->hora_inicio}}</td>
                            <td>{{$meeting->schedule->hora_fin}}</td>
                            <td>
                                @foreach ($meeting->schedule->doctor->specialities as $esp)
                                {{$esp->nombre}}
                                @endforeach
                            </td>
                            <td>{{$meeting->schedule->doctor->user->name}}</td>
                            <td>
                                @if ($meeting->estado==0)
                                <span class="text-success"> PENDIENTE </span>
                                @elseif ($meeting->estado==1)
                                <span class="text-warning"> FINALIZADO </span>
                                @else
                                <span class="text-danger"> CANCELADO </span>
                                @endif
                            </td>
                            <td style="display: flex;">
                                {{-- Eliminar Cita --}}
                                <form action="{{ route('cita.ver.destroy', $meeting) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Eliminar" class="btn btn-danger"
                                        style="margin: 0px 0px 0px 5px;">
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
</x-app-layout>
