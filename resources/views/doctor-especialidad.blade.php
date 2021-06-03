<x-app-layout>

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
                    <a href="{{ route('cita.reserva.edit', $dc) }}" class="btn btn-warning" >Elegir</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>




</x-app-layout>
