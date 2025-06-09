<?php

namespace App\Http\Controllers;

use App\Models\Tratamientos;
use Illuminate\Http\Request;

class TratamientosController extends Controller
{
    public function index()
    {
        $tratamientos = Tratamientos::all();
        return view('tratamientos.index', compact('tratamientos'));
    }

    public function create()
    {
        return view('tratamientos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NombreTratamiento' => 'required|string|max:100',
            'Descripcion' => 'nullable|string',
            'Status' => 'required|integer'
        ]);

        Tratamientos::create($request->all());

        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento creado correctamente.');
    }

    public function show(Tratamientos $tratamiento)
    {
        return view('tratamientos.show', compact('tratamiento'));
    }

    public function edit(Tratamientos $tratamiento)
    {
        return view('tratamientos.edit', compact('tratamiento'));
    }

    public function update(Request $request, Tratamientos $tratamiento)
    {
        $request->validate([
            'NombreTratamiento' => 'required|string|max:100',
            'Descripcion' => 'nullable|string',
            'Status' => 'required|integer'
        ]);

        $tratamiento->update($request->all());

        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento actualizado correctamente.');
    }

    public function destroy(Tratamientos $tratamiento)
    {
        $tratamiento->delete();

        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento eliminado correctamente.');
    }
}
