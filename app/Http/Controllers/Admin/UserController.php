<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {


        return view('admin.users.edit', compact('user'));

        //echo '<pre>' , var_export($user[0]["profile"]["nombre"],true) , '</pre>';
        /*foreach ($user as $usu) {
            echo $usu["profile"]->nombre;
            echo $usu["email"];
        }*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, User $user)
    {

        if ($request->email == $user->email) {
            $leve=['dni'=>'required|digits:8|integer',
                'nombre'=>'required|string',
                'email' =>'required|string|email|max:100',
                'apellido'=>'required|string',
                'edad'=>'required|digits:2|integer',
                'fecha_nac'=>'required',
                'sexo'=>'required|string'];

            $estricto=['dni'=>'required|digits:8|integer|unique:profiles',
                'nombre'=>'required|string',
                'email' => 'required|string|email|max:100',
                'apellido'=>'required|string',
                'edad'=>'required|digits:2|integer',
                'fecha_nac'=>'required',
                'sexo'=>'required|string'];    
        } else{
            $leve=['dni'=>'required|digits:8|integer',
                'nombre'=>'required|string',
                'email' =>'required|string|email|max:100|unique:users',
                'apellido'=>'required|string',
                'edad'=>'required|digits:2|integer',
                'fecha_nac'=>'required',
                'sexo'=>'required|string'];
            $estricto=['dni'=>'required|digits:8|integer|unique:profiles',
                'nombre'=>'required|string',
                'email' =>'required|string|email|max:100|unique:users',
                'apellido'=>'required|string',
                'edad'=>'required|digits:2|integer',
                'fecha_nac'=>'required',
                'sexo'=>'required|string'];    
        }


        

        if ($request->dni == $user->profile->dni ) {
            $request->validate($leve);
        } else {
            $request->validate($estricto);
        }

        //actualiza solo el modelo user
        $user->update(['name'=>$request->nombre,'email'=>$request->email]);

        //actualiza solo el modelo profile
        //$user->profile->update($request->only("nombre","apellido","edad","sexo","fecha_nac","dni"));
        $user->profile->update($request->all());
        return redirect()->route('admin.users.edit',$user)->with('msg','El usuario ha sido modificado correctamente');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
    
        $user->delete();
        return redirect()->route('admin.users.index',$user)->with('msg','El usuario ha sido eliminado correctamente');

    }
}
