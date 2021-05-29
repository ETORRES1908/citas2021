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
        //Validaciones --------------------------------------------------------

        $request->validate([
            'n_cmp' => 'required|unique:doctors|digits:6',
            'dni' => 'required|digits:8|integer',
            'specialities'=>'required'
        ]);

        //Buscamos el doctor segun el dni --------------------------------------------------------
        $perfil = Profile::where('dni',$request->dni)->first();


        //Evaluamos si el DNI ya ha sido usado por otro doctor  --------------------------------------------------------
        if(!is_null($perfil->user->doctor)){
          
            return redirect()->route('admin.doctors.create')
            ->with('mensaje','El dni de: '.$perfil->nombre.' ya fue asignado como doctor'); 
            die();

        } else { //En caso no se haya asignado el DNI -------------- creamos el doctor ------------------------------------------
            $doctor = Doctor::create(
            ['n_cmp'=>$request->n_cmp,
            'user_id'=>$perfil->user_id]
        );

        //Sincronzamos las especialidades con el doctor --------------------------------------------------------
            $doctor->specialities()->sync($request->specialities);
        
        return redirect()->route('admin.doctors.edit', $doctor)
        ->with('mensaje','Se asignó el Rol de doctor al usuario correctamente'); 
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('admin.doctors.show', compact('doctor'));
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
                'nombre'=>'required|string|between:1,20',
                'specialities'=>'required'
        ];

        $estricto= ['n_cmp' => 'required|digits:6|unique:doctors|integer',
        'nombre'=>'required|string|between:1,20',
        'specialities'=>'required'
        ];

        if ($request->n_cmp == $doctor->n_cmp) { //si el n_cmp son iguales a los que se enviaron
            $request->validate($leve);
        } else {
            $request->validate($estricto);
        }


        //actualiza solo el modelo doctor
        $doctor->update($request->only("n_cmp"));
        $doctor->user->update($request->only("name"));
        $doctor->user->profile->update($request->only("nombre","apellido"));

        //Campo de especialidades
        $doctor->specialities()->sync($request->specialities);
        

       //actualiza solo el modelo user
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