<x-app-layout>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="card-body" style="background: white">

        <div class="container py-8">


            <div style="padding-bottom: 30px">
                <a class="bg-white hover:bg-gray-100
                text-indigo-600 font-semibold py-2 px-4 border border-gray-400 rounded
                shadow" href="{{ route('wellcome.index')}}">Regresar</a>

            </div>
            @can('horarios.create')
                <div style="text-align:right;">
                <a class="bg-white hover:bg-gray-100
                text-green-600 font-semibold py-2 px-4 border border-gray-400 rounded
                shadow" href="{{ route('horarios.create')}}">Crear nuevos horarios</a>
            </div>
            @endcan


            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <p class="px-5 text text-3xl" style="text-align: center">
                            <strong>Tus horarios</strong>
                        </p>
                        <p> <h5 style="font-weight: bold"> Tus Especialidades : </h5>
                            <small>
                                @foreach ($specialities as $esp)
                                    <div>
                                        {{$esp->nombre. " "}}
                                    </div>
                                @endforeach
                            </small>
                        </p>
                        <div class="p-3 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table id="horarios" class="table table-hover min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
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
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Elegir</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($schedules as $schedule)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">

                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{$schedule->id}}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">

                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{$schedule->fecha_atencion}}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$schedule->hora_inicio}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$schedule->hora_fin}}</div>
                                        </td>
                                        <td class="px-2 py-4 whitespace-nowrap">


                                            @if ($schedule->estado==0)

                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Disponible
                                            </span>

                                            @elseif ($schedule->estado==1)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-600">
                                                Pendiente
                                            </span>
                                            @else


                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-600">
                                                Terminado
                                            </span>
                                            @endif
                                        </td>



                                        <td style="width:250px;" class="whitespace-nowrap text-center text-sm font-medium">

                                            @if ($schedule->estado==0)

                                            @elseif($schedule->estado==1)

                                        @can('horarios.edit')
                                            <a href="{{ route('horarios.edit', $schedule->id) }}"
                                                style="display: inline-block;"
                                                class="bg-white hover:bg-gray-100
                                                text-indigo-600 font-semibold py-2 px-4 border border-gray-400 rounded shadow"> Atender Cita
                                            </a>
                                        @endcan

                                            @elseif($schedule->estado==2)

                                        @can('horarios.show')
                                            <a href="{{ route('horarios.show', $schedule->id) }}"
                                                style="display: inline-block;"
                                                class="bg-white hover:bg-gray-100
                                                text-gray-600 font-semibold py-2 px-4 border border-gray-400 rounded shadow"> Ver Cita
                                            </a>
                                        @endcan


                                            @endif
                                        </td>
                                    </tr>
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
                <br>
                <form class="formulario-eliminar" style="text-align: center" action="{{ route('horarios.destroy', Auth::user()->doctor->id)}}" method="post">
                    @csrf
                    @method("DELETE")

                    <input value="Borrar Horarios Vacios" type="submit" class="bg-red-100 bg-opacity-100 text-center hover:bg-red-50
                    text-red-600 font-semibold py-2 px-4 border border-gray-400 rounded
                    shadow">

                </form>



            </div>
        </div>
    </div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>



        $(document).ready(function () {


            $('#horarios').DataTable({
                "responsive": true,
                "auto-with": false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                "order": [[0, "desc"]],

            });

        });

        $('.formulario-eliminar').submit(function(e){
                    e.preventDefault();
                        Swal.fire({
                        title: '¿Estas seguro?',
                        text: "Vas a eliminar los horarios no utilizados anteriormente. Esta acción es irreversible.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, estoy de acuerdo!',
                        cancelButtonText: 'Cancelar'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                        })
                });




    </script>
    @switch(session("mensaje"))
        @case("ok")
            <script>
                Swal.fire(
                        'Eliminado!',
                        'Los registros se eliminaron correctamente.',
                        'success'
                        )
            </script>
            @break
        @case("no")
            <script>
                Swal.fire(
                        'Vaya...',
                        'No hay registros por eliminar.',
                        'info'
                        )
            </script>
            @break
        @default

    @endswitch


</x-app-layout>
