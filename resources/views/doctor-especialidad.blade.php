<x-app-layout>
        <div class="card-body">
            <div class="container py-8">
                <p class="text text-3xl" style="padding: 0px 10px 10px 75px">Selecciona Doctor</p>

                <table id="doctores" class="table table-striped table-bordered" style="width:100%">
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

                    </tbody>
                </table>

            </div>
        </div>

</x-app-layout>
