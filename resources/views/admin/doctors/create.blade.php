@extends('adminlte::page')

@section('title', 'Blog 2021')

@section('content_header')
<h1>Añadir nuevo doctor</h1>
@stop

@section('content')
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet prefetch'
    href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<div class="card">
    <div class="card-header">

        @if (count($errors) > 0)
        <div class="text-danger">

            @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach

        </div>
        @endif

        @if (session('mensaje'))
        <div class="alert alert-warning">
            <strong>{{session('mensaje')}}</strong>
        </div>
        @endif

    </div>
    <div class="card-body">
        {!! Form::open(['method' => 'POST', 'route' => 'admin.doctors.store']) !!}

        {{--Añadir N_CMP--}}
        <div class="form-group">
            {!! Form::label('n_cmp1', 'N° CMP') !!}
            <div class="form-inline">
            {!! Form::text('n_cmp1', null, ['class' => 'form-control','placeholder'=>'Número de CMP', 'style'=>'float:left']) !!}
            <input type="hidden" name="n_cmp" id="n_cmp">
            &nbsp
            <div style="float:left; display: none" id="correcto">
                ✅ Correcto
            </div>
            &nbsp
            <div style="float:left; display:none" id="incorrecto">
                ❌ Incorrecto
            </div>
            </div>
            <br style="clear:both">
            <input type="button" class="btn btn-info" id="validar" value="Validar">
        </div>
        {{-- Seleccionar N°CMP --}}
        {{-- {!! Form::label('n_cmp', 'N° CMP') !!}<br>
        <div style="margin: 15px 20px" class="form-group">
            <div class="row">

                <div class="card">
                    <select name="n_cmp" id="n_cmp" class="selectpicker show-menu-arrow" data-style="form-control"
                        data-live-search="true" multiple data-max-options="1" title="Buscar N° CMP">
                        @foreach ($DCMP as $doctores)
                        @foreach ($doctores as $doctor)
                        <option value="{{$doctor['CMP']}}"
                            data-tokens="{{" " . $doctor['ApellidoPaterno']. " " . $doctor['ApellidoMaterno']. " " . $doctor['Nombres']}}">
                            {{$doctor['CMP'].": ".$doctor['ApellidoPaterno']. " " . $doctor['ApellidoMaterno']. " " . $doctor['Nombres'] }}
                        </option>
                        @endforeach
                        @endforeach
                    </select>
                </div>
            </div>
        </div>  --}}


        {{-- Seleccionar Usuario --}}
        {!! Form::label('dni', 'DNI del usuario') !!}<br>
        <div style="margin: 15px 20px" class="form-group">
            <div class="row">
                <!-- Multiple Item Picker -->
                <div class="card">
                    <select name="dni" id="dni" class="selectpicker show-menu-arrow" data-style="form-control"
                        data-live-search="true" multiple data-max-options="1" title="Buscar Usuario">
                        @foreach ($profiles as $profile)
                        <option value="{{$profile->dni}}"
                            data-tokens="{{" " . $profile->apellido. " " . $profile->nombre. " " . $profile->dni . " "}}">
                            {{$profile->apellido. " " . $profile->nombre. ", DNI:" . $profile->dni}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!--.row-->
        </div>
        <!--.container-->






        {{-- Seleccionar Especialidades--}}
        <div class=" form-group">
            {!! Form::label('specialities', 'Especialidades') !!}<br>
            @foreach ($specialities as $speciality)

            <label for="especialidad">
                {!! Form::checkbox('specialities[]', $speciality->id, null, ['class' => 'mr-1']) !!}
                {{$speciality->nombre}}
            </label><br>
            @endforeach
        </div>
    </div>


    <div style="margin: 15px 15px" class="form-group">

        {!! Form::submit('Crear', ['class' => ' btn btn-success']) !!}
    </div>
</div>


{!! Form::close() !!}

</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hola!');
</script>
<script>
    //Transformar los datos de PHP a Javascript
    var datacmp = <?php echo json_encode($DCMP['CMP']) ?>;
    //Al hacer click en el boton validar se ejecutara la siguiente funcion
    $('#validar').click(function(){
        //inicilizando la variable donde se almacenara los datos de validacion, nulo por defecto
        var valido = null;
        //console.log(datacmp);
        //declarar la variable que extraera el valor del cmp para la validacion
        var cmp = $('#n_cmp1').val();
        //condicional que permitira saber si el campo de texto esta vacio
        if(cmp!=''){
            //recorrer el arreglo mediante for
            for (let i = 0; i < datacmp.length; i++) {
                //condicional que nos permitira saber cuando se cumple
                //que el cmp existe en los datos traidos por el api
                if(datacmp[i].name == cmp){
                    //almacenando el dato que cumpla la condicion en una variable
                    valido = datacmp[i];
                }
            }
                    //Condicional que nos permitira saber si la variable
                    //de validacion cambio de nulo a otro valor
                    if(valido!=null){
                        //Condicional para verificar la actividad del doctor
                        if(valido.ESTADO == "ACTIVO"){
                            //validacion correcta, habilitara un div confirmando la validacion
                            $('#correcto').show('linear');
                            //deshabilitar el boton validar una vez verificado
                            $('#validar').prop('disabled', true);
                            //deshabilitar el campo validar una vez verificado
                            $('#n_cmp1').prop('readonly',true);
                            //darle valor al hidden donde viajara el dato hacia el controlador
                            $('#n_cmp').val(valido.name);
                        }else{
                            //Caso contrario
                            $('#n_cmp1').val('');
                            //Habilita un mensaje de error de validacion
                            $('#incorrecto').show('linear');
                            //Se asigna un tiempo donde se deshabilitara el mensaje de error
                            setTimeout(function(){
                            $('#incorrecto').hide('linear');
                            },1500);
                            $('#n_cmp1').prop('placeholder','Intente nuevamente...');
                            $('#n_cmp1').focus();
                        }
                }else{
                    //Variable de validacion sigue nulo, es decir no hay un cmp valido
                    $('#n_cmp1').val('');
                    //Habilita un mensaje de error de validacion
                    $('#incorrecto').show('linear');
                    //Se asigna un tiempo donde se deshabilitara el mensaje de error
                    setTimeout(function(){
                    $('#incorrecto').hide('linear');
                    },1500);
                    $('#n_cmp1').prop('placeholder','Intente nuevamente...');
                    $('#n_cmp1').focus();
                }

        }else{
            //Cuando es un campo vacio...
            $('#n_cmp1').prop('placeholder','Ingrese el numero...');
            //Habilita un mensaje de error de validacion
            $('#incorrecto').show('linear');
            //Se asigna un tiempo donde se deshabilitara el mensaje de error
            setTimeout(function(){
            $('#incorrecto').hide('linear');
            },1500);
            $('#n_cmp1').focus();
        }
    });

</script>
@stop

