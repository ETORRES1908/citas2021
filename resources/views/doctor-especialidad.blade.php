<x-app-layout>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="card-body" style="background: white">
        <div class="container py-8">
            <div style="padding-bottom: 30px">
                <a class="bg-white hover:bg-gray-100
                text-indigo-600 font-semibold py-2 px-4 border border-gray-400 rounded
                shadow" href="{{ route('cita.reserva.index')}}" >Regresar</a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <p class="text text-3xl" style="padding: 0px 10px 10px 75px">
                            Seleccionar doctor de la especialidad
                            <strong>{{$speciality->nombre}}</strong>
                        </p>
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table id="doctores" class="table table-hover min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nombres
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Datos Extra
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            N° CMP
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($speciality->doctors as $dc)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{$dc->user->profile->apellido}}, {{$dc->user->profile->nombre}}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        Medico Especialista
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900"> Correo : {{$dc->user->email}}</div>
                                            <div class="text-sm text-gray-500">
                                                DNI N° : {{$dc->user->profile->dni}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="text-sm text-gray-900"> {{$dc->n_cmp}}</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <a href="{{ route('cita.reserva.edit', $dc->pivot->speciality_id . '-' . $dc->pivot->doctor_id) }}"
                                                class="bg-white hover:bg-gray-100
                                                text-indigo-600 font-semibold py-2 px-4 border border-gray-400 rounded
                                                shadow">Elegir</a>
                                        </td>


                                    </tr>
                                    @endforeach
                                    <!-- More people... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
          $('#doctores').DataTable({
                "responsive":true,
                "auto-with":false,
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
    </script>
</x-app-layout>
