<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{

    public function __construct() {
        $this->middleware('can:horarios.index')->only('index');
        $this->middleware('can:horarios.create')->only('create','store');
        $this->middleware('can:horarios.edit')->only('update','edit');
        $this->middleware('can:horarios.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $schedules = Schedule::all()->where('doctor_id',Auth::user()->doctor->id);
        $specialities = Auth::user()->doctor->specialities;

        return view('schedules.index', compact('schedules','specialities'));
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

        $mytime = Carbon::now();

        $request->validate([
            'fecha_atencion'=>'required|date|after_or_equal:'.$mytime->toDateString("YY/mm/dd"),
            'hora_inicio' => 'required|before_or_equal:08:00|after_or_equal:06:00',
            'hora_fin' =>'required|before_or_equal:18:00|after_or_equal:17:00',

        ]);

        $fecha = $request->fecha_atencion;
        $horaInicial = $request->hora_inicio;
        $horaFinal = $request->hora_fin;
        $intervalo = $request->intervalo;

        $this->sumarTiempo($horaInicial,$fecha,$horaFinal,$intervalo);

        return redirect()->route('horarios.index')->with('mensaje','Los horarios se han creado correctamente');

        // CODIGO DE ELIMINACION DE REGISTROS VACIOS
    }

    public function sumarTiempo($horaInicial,$fecha,$horaFinal,$intervalo)
    {

        do {

            $hora_inicio = $horaInicial;
            $hora_nueva = strtotime($intervalo,strtotime($horaInicial)) ;
            $hora_nueva = date ('H:i' , $hora_nueva);

            Schedule::where("hora_inicio","LIKE","%12%")->orWhere("hora_inicio","LIKE","%13%")->delete(); // REFRIGERIO

            if($hora_nueva > $horaFinal){
                return redirect()->route('horarios.index')->with('mensaje','Los horarios se han creado correctamente');
            }

                Schedule::create([
                    "doctor_id"=> Auth::user()->doctor->id,
                    "fecha_atencion"=> $fecha,
                    "hora_inicio"=> $hora_inicio,
                    "hora_fin"=> $hora_nueva,
                    "estado"=>"0"

                ]);

            $horaInicial = $hora_nueva;

        } while ( $hora_nueva != $horaFinal);

        //el bucle se mantedra vigente siempre y cuando las horas de inicio y final NO sean iguales,
        //ademas mientras $finalizar sea igual a 0 y este no cambie su valor (DEBE DE CUMPLIR)

    }

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

            if ($meeting==null) {
                return redirect()->route('horarios.index');
            } else{
                return view('schedules.edit', compact('meeting'));
            }


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
        $schedule = Schedule::findOrFail($request->schedule_id);

        //$this->authorize('AtenderCita', $schedule);

        $meeting->update(["estado"=>"1", "observacion_med" => $request->observacion]);
        $schedule->update(["estado"=>"2"]);

        return redirect()->route('horarios.index')->with('mensaje','La cita ha finalizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mytime = Carbon::now();

        $result = Schedule::select()->where("fecha_atencion","<",$mytime->format("Y-m-d"))->where("estado","0")->delete();
        if($result==0){

            return redirect()->route('horarios.index')->with('mensaje','no');

        }else{

            return redirect()->route('horarios.index')->with('mensaje','ok');

        }



    }
}
