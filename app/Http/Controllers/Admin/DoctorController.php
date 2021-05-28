<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Profile;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Speciality;
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
        /*$doctors = Doctor::select('doctors.id','doctors.n_cmp','users.name','specialities.nombre')
                ->join('users', 'users.id', '=', 'doctors.id')
                ->join('doctor_speciality', 'doctor_speciality.doctor_id', '=', 'doctors.id')
                ->join('specialities', 'doctor_speciality.speciality_id', '=', 'specialities.id')
                ->get();
        /*  echo '<pre>' , var_export($data,true) , '</pre>'; */
        $doctors = Doctor::all();

    return view('admin.doctors.index', compact('doctors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $specialities = Speciality::all();
        return view('admin.doctors.create', compact('specialities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'n_cmp' => 'required|unique:doctors|digits:6',
            'dni' => 'required',
            'specialities'=>'required'
        ]);

        $perfil = Profile::where('dni',$request->dni)->first();


        $doctor = Doctor::create(['n_cmp'=>$request->n_cmp,'user_id'=>$perfil->user_id]);

        //Campo de especialidades
        if($request->specialities){
            $doctor->specialities()->sync($request->specialities);
        }

        return redirect()->route('admin.doctors.edit', $doctor)
        ->with('mensaje','Se añadio correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id','=',$id)->first();
        $doctors = Doctor::where('id','=',$id)->get();
        $speciality = Speciality::where('id','=',$id)->get();

        return view('admin.doctors.show', compact('doctors', 'speciality', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)

    {
        $specialities = Speciality::all();

        return view('admin.doctors.edit', compact('doctor', 'specialities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor,User $user)
    {

        $leve = ['n_cmp' => 'required|digits:6|integer',
        'nombre'=>'required|string',
        'specialities'=>'required'
        ];

        $estricto= ['n_cmp' => 'required|digits:6|unique:doctors|integer',
        'nombre'=>'required|string',
        'specialities'=>'required'
     ];

        if ($request->n_cmp == $doctor->n_cmp) {
            $request->validate($leve);
        } else {
            $request->validate($estricto);
        }

        //actualiza solo el modelo doctor
        $doctor->update($request->only("n_cmp"));

        //Campo de especialidades
        if($request->specialities){
            $doctor->specialities()->sync($request->specialities);
        }

        //actualiza solo el modelo user
        $user = User::findOrFail($doctor->user_id);
        $user->name = $request->get('nombre');
        $user->save();

        //actualiza solo el modelo profile
        $doctor->user->profile->update($request->only("nombre","apellido"));

        return redirect()->route('admin.doctors.edit', $doctor)
        ->with('mensaje','Doctor(a) '.$doctor->user->profile->nombre.' se editó correctamente');
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
