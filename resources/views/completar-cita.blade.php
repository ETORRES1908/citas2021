<x-app-layout>


    <div class="card-body" style="background: white">
        <div class="container py-8">

            <div class="flex flex-col" style="padding: 10px">
                <h1 class="text-3xl">Describa sus sintomas o malestares</h1>
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            {!! Form::open(['method' => 'POST', 'route' => 'cita.reserva.store']) !!}

                                {!! Form::text('estado',$datos->estado, ['hidden','class' => 'form-control']) !!}
                                {!! Form::text('schedule_id',$id, ['hidden','class' => 'form-control']) !!}
                                {!! Form::text('user_id', Auth::user()->id, ['hidden','class' => 'form-control']) !!}
                            {!! Form::hidden('especialidad', $datos->especialidad) !!}
                            <div>
                                {!! Form::textarea('descripcion', null,['class'=>'form-control resize-none border
                                rounded-md', 'placeholder'=>'Descripcion']) !!}
                            </div>
                            <div style="float:right" class="mx-auto px-4 py-3">
                                {!! Form::submit('Enviar', ['class' => 'bg-white hover:bg-gray-100 text-indigo-600
                                font-semibold py-2 px-4 border border-gray-400 rounded shadow']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
