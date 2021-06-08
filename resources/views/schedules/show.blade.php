<x-app-layout>
    <div class="container py-8">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 ">Detalle de la Cita</h3>
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
                                    <input type="text" value="Por el momento no se puede" name="especialidad"
                                        id="especialidad"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        disabled>
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="hora" class="block text-sm font-medium text-gray-700">Hora de
                                        atención</label>
                                    <input type="text"
                                        value="{{$meeting->schedule->hora_inicio . ' hasta ' . $meeting->schedule->hora_fin}}"
                                        name="hora" id="hora"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        disabled>
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="sintomas" class="block text-sm font-medium text-gray-700">Descripcion de
                                        sintomas</label>

                                    <textarea type="text" name="sintomas" id="sintomas"
                                        class="resize-none mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        cols="10" rows="5" disabled>{{$meeting->descripcion}}</textarea>
                                </div>

                                <div class="col-span-6 sm:col-span-6">

                                    <label for="observacion" class="block text-sm font-medium text-gray-700">Observacion
                                        del doctor</label>

                                    <textarea type="text" name="observacion" id="observacion"
                                        class="resize-none mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        cols="10" rows="10"></textarea>
                                </div>

                            </div>
                            <div class="py-3 bg-gray-50 text-right">
                                {!! Form::submit('Crear Horario', ['class' => 'bg-white hover:bg-gray-100
                                text-green-600 font-semibold py-2 px-4 border border-gray-400 rounded
                                shadow']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
