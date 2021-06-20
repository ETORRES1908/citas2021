<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function __construct() {
        $this->middleware('can:admin.roles.index')->only('index');
        $this->middleware('can:admin.roles.create')->only('create','store');
        $this->middleware('can:admin.roles.edit')->only('update','edit');
        $this->middleware('can:admin.roles.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $permissions = Permission::select()->where('name','<>','horarios.index')
        ->where('name','<>','horarios.create')
        ->where('name','<>','horarios.show')
        ->where('name','<>','horarios.edit')
        ->get();

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validacion = ['name' => 'required|max:50|min:1|string',
        'permissions'=> 'required'];

        $request->validate($validacion);

        $validacion = ['name' => 'required|max:50|min:1|string'];
        $request->validate($validacion);

        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit', $role)
        ->with('mensaje','El rol se creó correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::select()->where('name','<>','horarios.index')
        ->where('name','<>','horarios.create')
        ->where('name','<>','horarios.show')
        ->where('name','<>','horarios.edit')
        ->get();

        return view('admin.roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        $validacion = ['name' => 'required|max:50|min:1|string'];
        $request->validate($validacion);

        $role->update($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit', $role)
        ->with('mensaje','El rol se editó correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')
        ->with('mensaje','El rol se editó correctamente');


    }
}
