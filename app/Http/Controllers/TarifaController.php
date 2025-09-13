<?php

namespace App\Http\Controllers;

use App\Models\Tarifa;
use Illuminate\Http\Request;

class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarifas = Tarifa::all();
        return view('admin.tarifas.index', compact('tarifas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tarifas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return response()->json($request->all());
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'cantidad' => 'required',
            'costo' => 'required',
            'minutos_de_gracia' => 'required',
        ]);

        $tarifa =new Tarifa();
        $tarifa->nombre = $request->nombre;
        $tarifa->tipo = $request->tipo;
        $tarifa->cantidad = $request->cantidad;
        $tarifa->costo = $request->costo;
        $tarifa->minutos_de_gracia = $request->minutos_de_gracia;
        $tarifa->save();
        return redirect()->route('admin.tarifas.index')
            ->with('mensaje', 'Tarifa Registrado Correctamente.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarifa $tarifa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarifa $tarifa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarifa $tarifa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarifa $tarifa)
    {
        //
    }
}
