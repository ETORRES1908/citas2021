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

class VerCitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Meeting::all()->where('user_id',Auth::user()->id);
        return view('user.vercitas', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** Ver historial de citas */
    public function create()
    {
        $citas = Meeting::all()->where('user_id',Auth::user()->id);
        return view('user.historial', compact('citas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $meeting = Meeting::findOrFail($request);
        // return view('user.detalle', compact('meeting'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */




    /**Ver detalle de Cita */
    public function edit($meeting)
    {
        $detalle = Meeting::findOrFail($meeting);
        return view('user.detalle', compact('detalle'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update($meeting)
    {

    }

/**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Meeting  $meeting
    * @return \Illuminate\Http\Response
*/
    public function destroy($id){ // id del meeting

            $meeting = Meeting::findOrFail($id);

            //ACTUALIZAMOS EL HORARIO DEL DOCTOR
            $meeting->schedule->update(["estado"=>"0"]);

            //BORRAMOS LA CITA CREADA
            $meeting->delete();

            return redirect()->route('cita.ver.index')
            ->with('mensaje','Se canceló la cita correctamente',);
        }
}
