<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
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

    public function permisos($id)
    {
        $role = Role::find($id);
        $permisos = Permission::all()->groupBy(function($permiso){
            if(strpos($permiso->name, 'ajuste')!== false ){ return 'Ajustes'; }           
            if(strpos($permiso->name, 'role')!== false ){ return 'Roles'; }        
            if(strpos($permiso->name, 'usuario')!== false ){ return 'Usuarios'; }      
            if(strpos($permiso->name, 'espacio')!== false ){ return 'Espacios'; }   
            if(strpos($permiso->name, 'tarifa')!== false ){ return 'Tarifas'; }  
            if(strpos($permiso->name, 'cliente')!== false ){ return 'Clientes'; }
            if(strpos($permiso->name, 'vehiculo')!== false ){ return 'Vehiculos'; }
            if(strpos($permiso->name, 'ticket')!== false ){ return 'Tickets'; }
            if(strpos($permiso->name, 'facturacion')!== false ){ return 'Facturaciones'; }
            if(strpos($permiso->name, 'reporte')!== false ){ return 'Reportes'; }
        });
        //return response()->json($permisos);
        return view('admin.roles.permisos', compact('role', 'permisos'));
    }

    public function update_permisos(Request $request, $id)
    {
        //return response()->json($request->all());
        $role = Role::find($id);
        $role->permissions()->sync($request->permisos);

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Permisos Asignados Correctamente.')
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
        $rol = Role::find($id);
        $usuarios_asociados = User::role($rol->name)->count();

        if($usuarios_asociados > 0){
            return redirect()->route('admin.roles.index')
            ->with('mensaje', 'No se pude Eliminar el Rol: '.$rol->name.' por que tiene '.$usuarios_asociados.' Usuarios asociados.')
            ->with('icono', 'error');
        }
        $rol->delete();

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol Eliminado Correctamente.')
            ->with('icono', 'success');
    }
}
