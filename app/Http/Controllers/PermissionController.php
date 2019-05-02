<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Permission;

class PermissionController extends Controller
{
    public function __constructor(){
        $this->middleware('permission:privilegios.index')->only('index');
	    //$this->middleware('permission:privilegios.create')->only(['create','store']);
	    // $this->middleware('permission:privilegios.edit')->only(['update','edit']);
	    $this->middleware('permission:privilegios.show')->only('show');
	    $this->middleware('permission:privilegios.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate();
        return view('privilegios.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('privilegios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = Permission::create($request->all());
        return redirect()->route('privilegios.create')
                    ->with('info', 'Privilegios Guardado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return view('privilegios.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd(Permission::findOrfail($id));
        return view('privilegios.edit', ['privilegio' => Permission::findOrfail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $privilegio)
    {
        $privilegio->update($request->all());
        return redirect()->route('privilegios.edit' , $privilegio->id)
                    ->with('info', 'Permission Actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $privilegio)
    {
        $privilegio->delete();
        return back()->with('info','Eliminado Correctamente');
    }
}
