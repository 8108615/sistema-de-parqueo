<?php

namespace App\Http\Controllers;

use App\Mail\RegistroUsuarioMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios =  User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return response()->json($request->all());
        $request->validate([
            'rol' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'tipo_documento' => 'required|in:DNI,CARNET DE EXTRANJERIA,PASAPORTE,RUC,CI',
            'numero_documento' => 'required|string|max:20|unique:users',
            'celular' => 'required|string|max:20',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|in:Masculino,Femenino,Otro',
            'direccion' => 'required|string|max:255',
            'contacto_nombre' => 'required|string|max:255',
            'contacto_telefono' => 'required|string|max:20',
            'contacto_parentesco' => 'required|string|max:100',
        ]);

        $passwordTemporal = Str::random(8);

        $usuario = new User();
        $usuario->name = $request->nombres . ' ' . $request->apellidos;
        $usuario->email = $request->email;
        $usuario->password = $passwordTemporal;
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->tipo_documento = $request->tipo_documento;
        $usuario->numero_documento = $request->numero_documento;
        $usuario->celular = $request->celular;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->genero = $request->genero;
        $usuario->direccion = $request->direccion;
        $usuario->contacto_nombre = $request->contacto_nombre;
        $usuario->contacto_telefono = $request->contacto_telefono;
        $usuario->contacto_parentesco = $request->contacto_parentesco;
        $usuario->save();

        Mail::to($usuario->email)->send(new RegistroUsuarioMail($usuario, $passwordTemporal));

        $usuario->assignRole($request->rol);

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Usuario Creado Correctamente y Contraseña enviado al Correo del Usuario.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = User::find($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        $roles = Role::all();
        return view('admin.usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
