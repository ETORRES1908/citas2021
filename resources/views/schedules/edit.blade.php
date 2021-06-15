<x-app-layout>
    {!! Form::open(['method' => 'PUT', 'route' => ['horarios.update',$meeting]]) !!}

    <div class="container py-8">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 ">Atencion de la Cita</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Fecha en la que será atendido el paciente: <br>
                        <h5 class="mt-1 text-sm text-green-500">
                            {{date("d/m/Y",strtotime($meeting->schedule->fecha_atencion))}}</h5>
                        </p>
                        <div class="px-4 py-10 bg-gray-50 text-left sm:px-6">
                            <a href="{{ route('horarios.index')}}" class="bg-white hover:bg-gray-100
            text-indigo-600 font-semibold py-2 px-4 border border-gray-400 rounded
            shadow">Volver</a>
                        </div>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">


                                <div class="col-span-6 sm:col-span-6">
                                    <label for="hora" class="block text-sm font-bold text-indigo-700">Detalles de la
                                        cita</label>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="doctor" class="block text-sm font-medium text-gray-700">Doctor</label>
                                    <input type="text"
                                        value="{{$meeting->schedule->doctor->user->name . ' ' . $meeting->schedule->doctor->user->profile->apellido}}"
                                        name="doctor" id="doctor"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        disabled>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="especialidad"
                                        class="block text-sm font-medium text-gray-700">Especialidad</label>
                                    <input type="text" value="{{$meeting->speciality->nombre}}" name="especialidad"
                                        id="especialidad"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        disabled>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="hora" class="block text-sm font-medium text-gray-700">Hora de
                                        atención</label>
                                    <input type="text"
                                        value="{{$meeting->schedule->hora_inicio . ' hasta ' . $meeting->schedule->hora_fin}}"
                                        name="hora" id="hora"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        disabled>
                                </div>
                                {{--
                                ----------------------------------------------------------------------------------------------------------------------------------------
                                --}}
                                <div class="col-span-6 sm:col-span-6 pt-8">
                                    <label for="hora" class="block text-sm font-bold text-indigo-700">Detalles del
                                        Paciente</label>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="hora" class="block text-sm font-medium text-gray-700">Nombres y
                                        Apellidos</label>
                                    <input type="text"
                                        value="{{$meeting->user->profile->nombre ." ". $meeting->user->profile->apellido}}"
                                        name="hora" id="hora"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        disabled>
                                </div>

                                <div class="col-span-6 sm:col-span-1">
                                    <label for="hora" class="block text-sm font-medium text-gray-700">Edad</label>
                                    <input type="text" value="{{$meeting->user->profile->edad}}" name="hora" id="hora"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        disabled>
                                </div>


                                <div class="col-span-6 sm:col-span-2">
                                    <label for="hora" class="block text-sm font-medium text-gray-700">Sexo</label>
                                    <input type="text" value="{{$meeting->user->profile->sexo}}" name="hora" id="hora"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        disabled>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="hora" class="block text-sm font-medium text-gray-700">Correo</label>
                                    <input type="text" value="{{$meeting->user->email}}" name="hora" id="hora"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        disabled>
                                </div>


                                <div class="col-span-6 sm:col-span-3">
                                    <label for="hora" class="block text-sm font-medium text-gray-700">DNI</label>
                                    <input type="text" value="{{$meeting->user->profile->dni}}" name="hora" id="hora"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        disabled>
                                </div>


                                {{--
                                ----------------------------------------------------------------------------------------------------------------------------------------
                                --}}

                                <div class="col-span-6 sm:col-span-6 pt-8">
                                    <label for="hora" class="block text-sm font-bold text-indigo-700">Diagnóstico</label>
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="sintomas" class="block text-sm font-medium text-gray-700">Descripcion de
                                        sintomas</label>

                                    <textarea type="text" name="sintomas" id="sintomas"
                                        class="resize-none mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        cols="10" rows="5" disabled>{{$meeting->descripcion}}</textarea>
                                </div>

                                <div class="col-span-6 sm:col-span-6">

                                        @if (request()->routeIs('horarios.edit'))
                                            @php
                                                $estado = ""
                                            @endphp
                                        @else
                                            @php
                                                $estado = "disabled"
                                            @endphp
                                        @endif

                                    <textarea type="text" name="observacion" id="observacion"
                                        class="resize-none mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        cols="10" rows="20" {{$estado}}>{!! $meeting->observacion_med!!}</textarea>
                                </div>

                            </div>

                            @if (request()->routeIs('horarios.edit'))
                              <div class="py-3 bg-gray-50 text-right">
                                    {!! Form::submit('Responder Cita', ['class' => 'bg-white hover:bg-gray-100
                                    text-green-600 font-semibold py-2 px-4 border border-gray-400 rounded
                                    shadow']) !!}
                                </div>
                             @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {!! Form::hidden("meeting_id", $meeting->id) !!}
    {!! Form::hidden("schedule_id", $meeting->schedule->id) !!}

    {!! Form::close() !!}
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace('observacion')</script>
</x-app-layout>
