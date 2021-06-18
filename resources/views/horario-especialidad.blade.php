<x-app-layout>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="card-body" style="background: white">
        <div class="container py-8">
            <div style="padding-bottom: 30px">
                <a class="bg-white hover:bg-gray-100
                text-indigo-600 font-semibold py-2 px-4 border border-gray-400 rounded
                shadow" href="{{URL::previous()}}">Regresar</a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <p class="text text-3xl" style="padding: 0px 10px 10px 75px">
                            Seleccionar horario del
                            <strong>Dr. {{$doctor->user->name}}</strong>
                        </p>
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table id="horarios" class="table table-hover min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Fecha Programa
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Hora Inicio
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Hora Fin
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Estado
                                        </th>
                                        {{-- <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Elegir
                                        </th> --}}

                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Elegir
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($doctor->schedules as $sc)
                                    {!! Form::open(['method' => 'PUT', 'route' => ['cita.reserva.update', $sc->id]]) !!}
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{$sc->fecha_atencion}}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$sc->hora_inicio}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$sc->hora_fin}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($sc->estado==0)
                                            {!! Form::text('estado',"1", ['hidden','class' => 'form-control']) !!}
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Disponible
                                            </span>
                                            @elseif ($sc->estado==1)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-600">
                                                Ocupado
                                            </span>
                                            @else
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-600">
                                                Terminado
                                            </span>
                                            @endif
                                        </td>
                                        {!! Form::hidden('especialidad', $especialidad->id) !!}
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            @if ($sc->estado==0)
                                            {{-- Recogemos el user_id del Auth::user() --}}
                                            {!! Form::text('user_id', Auth::user()->id, ['hidden','class' =>
                                            'form-control']) !!}
                                            {{-- Boton Submit --}}
                                            {!! Form::submit('Seleccionar', ['class' => 'bg-white hover:bg-gray-100
                                            text-indigo-600 font-semibold py-2 px-4 border border-gray-400 rounded
                                            shadow'])!!}
                                            @endif
                                        </td>
                                    </tr>
                                    {!! Form::close() !!}
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Fecha Programa
                                        </th>
                                        <th scope="col"
                                            class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Hora Inicio
                                        </th>
                                        <th scope="col"
                                            class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Hora Fin
                                        </th>
                                        <th scope="col"
                                            class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Estado
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Elegir</span>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--     <script>
        $(document).ready(function () {
          $('#horarios').DataTable({
                "responsive":true,
                "auto-with":false,
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
    </script> --}}
</x-app-layout>
