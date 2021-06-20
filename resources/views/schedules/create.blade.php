<x-app-layout>
    <div class="container py-8">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Creacion de Horarios</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Aqui podras crear los horarios, segun las horas de inicio y fin por dia: <br>
                        </p>
                        <div class="px-4 py-10 bg-gray-50 text-left sm:px-6">
                            <a href="{{ route('horarios.index')}}" class="bg-white hover:bg-gray-100
                    text-indigo-600 font-semibold py-2 px-4 border border-gray-400 rounded
                    shadow">Volver</a>

                    <div class="px-4 py-10 bg-gray-50 text-left sm:px-6">
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach

                    </div>

                        </div>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md">

                        {{-- 'fechaFinal' => 'required|after_or_equal:fechaInicial' --}}
                        <div class="px-4 py-5 bg-white sm:p-6">
                            {!! Form::open(['method' => 'POST', 'route' => 'horarios.store']) !!}


                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-2">

                                    <label for="fecha_atencion" class="block text-sm font-medium text-gray-700">Fecha de
                                        Horario</label>
                                    <input type="date" name="fecha_atencion" id="fecha_atencion"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="time" class="block text-sm font-medium text-gray-700">Hora
                                        inicio</label>
                                    <input type="time" step="1800" min="06:00" max="08:00" name="hora_inicio"
                                        id="hora_inicio"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <div class="text-sm text-gray-500 py-2">
                                        Los valores de horario permitidos son: 6:00  - 8:00 , con un intervalo de 30
                                        min
                                    </div>

                                </div>

                                <div class="col-span-6 sm:col-span-2">
                                    <label for="time" class="block text-sm font-medium text-gray-700">Hora
                                        Fin</label>
                                    <input type="time" step="1800" min="17:00" max="18:00" name="hora_fin"
                                        id="hora_fin"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <div class="text-sm text-gray-500 py-2">
                                        Los valores de horario permitidos son: 17:00  - 18:00, con un intervalo de 30
                                        min
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="intervalo" class="block text-sm font-medium text-gray-700">Intervalo</label>
                                    <select id="intervalo" name="intervalo" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="+30 minute">30 min</option>
                                        <option value="+60 minute">1 hora</option>
                                        <option value="+90 minute">1 hora y media</option>
                                    </select>
                                </div>
                            </div>



                            <div class="py-3 bg-gray-50 text-right">
                                {!! Form::submit('Crear Horario', ['class' => 'bg-white hover:bg-gray-100
                                text-green-600 font-semibold py-2 px-4 border border-gray-400 rounded
                                shadow']) !!}
                            </div>

                            {!! Form::close() !!}

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
