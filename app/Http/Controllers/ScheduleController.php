<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Schedule;
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
        //
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
