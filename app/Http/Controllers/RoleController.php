<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return response()->json($request->all());
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        $rol =new Role();
        $rol->name = strtoupper($request->name);
        $rol->save();
        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol Creado Correctamente.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,'.$id,
        ]);

        $role = Role::find($id);
        $role->name = strtoupper($request->name);
        $role->save();

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol Actualizado Correctamente.')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol Eliminado Correctamente.')
            ->with('icono', 'success');
    }
}
