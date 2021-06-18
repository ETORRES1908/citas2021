<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Schedule;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $schedules = Schedule::all()->where('doctor_id',Auth::user()->id);
        return view('schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //return $request;


        $fecha = $request->fecha_atencion;
        $horaInicial = $request->hora_inicio;
        $horaFinal = $request->hora_fin;
        $intervalo = $request->intervalo;


        //$miHora = new DateTime($horaInicial);
        //$horaFinal = new DateTime($horaFinal);

        $this->sumarTiempo($horaInicial,$fecha,$horaFinal,$intervalo);

        return redirect()->route('horarios.index')->with('mensaje','Los horarios se han creado correctamente');
        // CODIGO DE ELIMINACION DE REGISTROS VACIOS
    }

    public function sumarTiempo($horaInicial,$fecha,$horaFinal,$intervalo)
    {

            //esta es la llave que finaliza el bucle
            $finalizar = 0;

        do {


            $hora_inicio = $horaInicial;
            $hora_nueva = strtotime($intervalo,strtotime($horaInicial)) ;
            $hora_nueva = date ('H:i' , $hora_nueva);

            Schedule::where("hora_inicio","LIKE","%13%")->orWhere("hora_inicio","LIKE","%14%")->delete(); // REFRIGERIO


            if($hora_nueva > $horaFinal){
                return redirect()->route('horarios.index')->with('mensaje','Los horarios se han creado correctamente');
            }

                Schedule::create([
                    "doctor_id"=> Auth::user()->id,
                    "fecha_atencion"=> $fecha,
                    "hora_inicio"=> $hora_inicio,
                    "hora_fin"=> $hora_nueva,
                ]);

            $horaInicial = $hora_nueva;

        } while ( $hora_nueva != $horaFinal);

        //el bucle se mantedra vigente siempre y cuando las horas de inicio y final NO sean iguales,
        //ademas mientras $finalizar sea igual a 0 y este no cambie su valor (DEBE DE CUMPLIR)

    }


/*
    public function store(Request $request)
    {

        $fecha = $request->fecha_atencion;
        $horaInicial = $request->hora_inicio;
        $horaFinal = $request->hora_fin;
        $intervalo = $request->intervalo;

        $this->sumarTiempo(new DateTime($horaInicial), $fecha, $horaFinal, $intervalo);

        return redirect()->route('horarios.index')->with('mensaje','Los horarios se han creado correctamente');

    }


    public function sumarTiempo(DateTime $miHora,$fecha,$horaFinal,$intervalo)
    {

            //esta es la llave que finaliza el bucle
            $finalizar = 0;
            $hora_nueva = $miHora->format('H:i'); //6:00 esta es la hora inicial, la cual marcara el inicio del bucle

        do {
            //crearemos un objeto de tipo horario y asignamos los datos repetitivos
            $horario = new Schedule();

            $horario->doctor_id = Auth::user()->id;
            $horario->fecha_atencion = $fecha;            //asignamos la fecha


            $horario->hora_inicio = $hora_nueva;            //7:00  //asignamos la hora inicial
            $hora_nueva = $miHora->modify($intervalo);      //8:00

            $horario->hora_fin = $hora_nueva;               //asignamos la hora modificada (+30min,+60min,+90min)
            $horario->estado = "0";                         //estado

            //convertimos a tipo date para poder hacer comparaciones
            $hora1 = strtotime( $horario->hora_fin->format('H:i'));
            $hora2 = strtotime( $horaFinal );

            //si en caso, la hora de inicio supere a la hora final, se rompera el bucle de manera automatica
            if($hora1>$hora2){
                $finalizar = 1;
            }

            $horario->save(); // GUARDAMOS

        } while ( $hora1 != $hora2 && $finalizar==0);
        //el bucle se mantedra vigente siempre y cuando las horas de inicio y final NO sean iguales,
        //ademas mientras $finalizar sea igual a 0 y este no cambie su valor (DEBE DE CUMPLIR AMBAS)


    } */















    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show($schedule)
    {
        $meeting =  Schedule::findOrFail($schedule)->meeting;
        return view('schedules.edit', compact('meeting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit($schedule)
    {
        //llega el id del horario
        //encuentra el modelo por el id
        //despues llama a la relacion de uno a uno con el meeting
        //y lo almacena en un modelo nuevo, se compacta y se envia a la vista

        $meeting =  Schedule::findOrFail($schedule)->meeting;

        return view('schedules.edit', compact('meeting'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $meeting = Meeting::findOrFail($request->meeting_id);
        $meeting->update(["estado"=>"1", "observacion_med" => $request->observacion]);

        $schedule = Schedule::findOrFail($request->schedule_id);
        $schedule->update(["estado"=>"2"]);

        return redirect()->route('horarios.index')->with('mensaje','La cita ha finalizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        return "delete";
    }
}
