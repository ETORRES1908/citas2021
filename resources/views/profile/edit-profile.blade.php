<x-app-layout>

        <div class="container py-2" >
                <h1  style="padding-top:50px">Editar Usuario</h1>
            <div class="card">

                <div class="card-header">

                    @if (session('msg'))
                        <div class="alert alert-success">
                            <strong>{{session('msg')}}</strong>
                        </div>
                    @endif

                    @if (count($errors) > 0)
                    <div class="text-danger">
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                    </div>
                    @endif

                </div>


                <div class="card-body">

                    {!! Form::model($user, ['route' => ['usuario.perfil.update', $user->id], 'method' => 'PUT']) !!}

                        <div class="form-group " >

                                <div class="form-group">
                                    {!! Form::label('nombre', 'Nombre') !!}
                                    {!! Form::text('nombre', $user->profile->nombre, ['class' => 'form-control','required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('apellido', 'Apellidos') !!}
                                    {!! Form::text('apellido', $user->profile->apellido, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'Correo') !!}
                                    {!! Form::email('email', $user->email, ['class' => 'form-control', 'required']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('dni', 'DNI') !!}
                                    {!! Form::text('dni', $user->profile->dni, ['class' => 'form-control','required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('fecha_nac', 'Fecha de Nacimiento') !!}
                                    {!! Form::date('fecha_nac', $user->profile->fecha_nac, ['class' => 'form-control','required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('edad', 'Edad') !!}
                                    {!! Form::text('edad', $user->profile->edad, ['class' => 'form-control','required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('sexo', 'Sexo') !!}
                                    {!! Form::select('sexo',array('m'=>'Masculino','f'=>'Femenino'), $user->profile->sexo, ['class' => 'form-control','required']) !!}
                                </div>

                        </div>

                        <div class="form-group">
                            <a class="bg-white hover:bg-gray-100
                            text-indigo-600 font-semibold py-2 px-4 border border-gray-400 rounded
                            shadow float-left" href="{{route('profile.show')}}">Regresar</a>
                            {!! Form::submit("Actualizar", ['class' => 'btn btn-primary float-right']) !!}
                        </div>

                    {!! Form::close() !!}
            </div>

        </div>




</x-app-layout>
