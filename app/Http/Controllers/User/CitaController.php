<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Profile;
use App\Models\User;
use App\Models\Meeting;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = Speciality::all();
        return view('reservarcita',compact('specialities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //var_dump($speciality);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Schedule $horario)
    {
        //Validar
        $request->validate([
            'estado'=>'required',
            'schedule_id' => 'required',
            'user_id' => 'required',
            'descripcion' => 'required'
        ]);

        //Modificar estado del horario
        $horario = Schedule::find($request->schedule_id);
        if($horario->estado == 0){
            $horario->estado = $request->estado;
            $horario->save();
        } else{
            return redirect()->route('cita.ver.show', Auth::user()->id)->with('mensaje','No se puede reservar el horario en este momento');
        }


        //Crear Cita medica CANCELADO
        Meeting::create(
            ['descripcion'=>$request->descripcion,
            'estado'=>'0',
            'user_id'=>$request->user_id,
            'schedule_id'=>$request->schedule_id]);

        return redirect()->route('cita.ver.show', Auth::user()->id)->with('mensaje','Se hizo la reservación correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $speciality = Speciality::find($id);
        return view('doctor-especialidad',compact('speciality'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dc)
    {
        //
        $doctor = Doctor::find($dc);
        /* echo '<pre>' , var_export($doctor,true) , '</pre>'; */
        return view('horario-especialidad',compact('doctor'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'estado'=>'required',
            //'schedule_id' => 'required',
            'user_id' => 'required'
        ]);


        $datos =  $request;

        return view('completar-cita', compact('datos','id'));
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}