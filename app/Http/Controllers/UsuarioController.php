<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use App\Http\Controllers\Auth\RegisterController;

class UsuarioController extends Controller
{
    public function __constructor(){
        
    }
    public function index(){ //vista
        return view('usuario.index');
    }

    public function getUsers(){
        return User::all();
    }

    public function create() //vista
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $registro = new RegisterController;
        dd($registro->create($request));     
        return User::create($request->all());
    }

    public function show(Request $request, User $user) //vista
    {
        $user->update($request->all());
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('usuario.edit', $user->id)
                    ->with('info', 'Usuario Actualizado con exito');
    }


    public function edit(User $user) //vista
    {   
        $roles = Role::get();
        return view('usuario.edit', compact('user', 'roles') );
    }

    public function update(Request $request, User $user)
    {     
        //actualiza usuario
        $user->update($request->all());
        //actualiza roles
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('usuario.edit', $user->id)
                    ->with('info', 'Usuario Actualizado con exito');
    }

    public function destroy($id)
    {
        $usuario = User::findOrfail($id);
        $usuario->delete();
        return 204;
    }
}
