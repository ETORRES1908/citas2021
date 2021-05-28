<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use Illuminate\Http\Request;


class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = Speciality::all();
        return view('admin.specialities.index', compact('specialities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specialities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|unique:specialities|max:50|min:10|string',
            'descripcion' => 'required|max:500|min:10|string'
        ]);

        $speciality = Speciality::create($request->all());

        return redirect()->route('admin.specialities.edit', $speciality)
        ->with('mensaje','La Especialidad se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function show(Speciality $speciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function edit(Speciality $speciality)
    {
        return view('admin.specialities.edit', compact('speciality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Speciality $speciality)
    {

        $leve = ['nombre' => 'required|max:50|min:10|string',
            'descripcion' => 'required|max:500|min:10|string'];

        $estricta = ['nombre' => 'required|unique:specialities|max:50|min:10|string',
            'descripcion' => 'required|max:500|min:10|string'];


        if($speciality->nombre == $request->nombre)
            $request->validate($leve);
        else{
            $request->validate($estricta);
        }

        $speciality->update($request->all());

        return redirect()->route('admin.specialities.edit', $speciality)
        ->with('mensaje','La Especialidad se editó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speciality $speciality)
    {
        $speciality->delete();

        return redirect()->route('admin.specialities.index', $speciality)
        ->with('mensaje','La Especialidad se elimino correctamente');
    }
}
