<x-app-layout>
<<<<<<< HEAD
    <div class="card-body" style="background: white">
        <div class="container py-8">
            <p class="text text-3xl" style="padding: 0px 10px 10px 75px">Selecciona Doctor</p>

            <table id="doctores" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>N_CMP</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($speciality->doctors as $dc)
                    <tr>
                        <td>{{$dc->user->profile->nombre}}</td>
                        <td>{{$dc->user->profile->apellido}}</td>
                        <td>{{$dc->n_cmp}}</td>
                        <td>
                            <a href="{{ route('cita.reserva.edit', $dc) }}" class="btn btn-warning">Elegir</a>
                        </td>
                    </tr>
                    @endforeach
=======
    <!-- This example requires Tailwind CSS v2.0+ -->
    
    <div class="container">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table id="doctores" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombres
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Especialidad
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                        <div class="text-sm text-gray-900">{{$dc->specialities[0]->nombre}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{$dc->n_cmp}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                        <a href="{{ route('cita.reserva.edit', $dc) }}" class="text-indigo-600 hover:text-indigo-900">Elegir</a>
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
>>>>>>> origin/citas-elmer

                </tbody>
            </table>

        </div>
    </div>
    <script>
        $(document).ready(function () {
          $('#doctores').DataTable(

    {
        "responsive":true,
        "auto-with":false,
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    }
          );
        });
    </script>
</x-app-layout>
