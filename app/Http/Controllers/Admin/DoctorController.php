<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Specialities;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $doctors = Doctor::with('user','specialities')->where('id', '=', $doctors)->get(); */

        /*  Select  con inners join  */
        $doctors = Doctor::select('doctors.id','doctors.n_cmp','users.name','specialities.nombre')
                ->join('users', 'users.id', '=', 'doctors.id')
                ->join('doctor_speciality', 'doctor_speciality.doctor_id', '=', 'doctors.id')
                ->join('specialities', 'doctor_speciality.speciality_id', '=', 'specialities.id')
                ->get();
               /*  echo '<pre>' , var_export($data,true) , '</pre>'; */


     return view('admin.doctors.index', compact('doctors'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* $request->validate([
            'nombre' => 'required|unique:specialities|max:50|min:10|string',
            'descripcion' => 'required|max:500|min:10|string'
        ]); */

        $doctors = Doctor::create($request->all());

        return redirect()->route('admin.doctors.edit', $doctors)
        ->with('mensaje','La doctors se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('admin.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {

         $leve = ['n_cmp' => 'required|digits:6|unique:doctors|integer'];

        $request->validate($leve);


        $doctor->update($request->all());

        return redirect()->route('admin.doctors.edit', $doctor)
        ->with('mensaje','La Doctor(a) se editó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('admin.doctors.index', $doctor)
        ->with('mensaje','Se elimino Doctor(a) correctamente');
    }
}
