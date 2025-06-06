<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estados;

class EstadosController extends Controller
{
    public function index()
    {
        $estados = Estados::all();
        return view('estados.index', compact('estados'));
    }

    public function create()
    {
        return view('estados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NombreEstado' => 'required|string|max:100',
            'Status' => 'required|integer',
        ]);

        Estados::create($request->all());

        return redirect()->route('estados.index')->with('success', 'Estado creado correctamente.');
    }

    public function show($id)
    {
        $estado = Estados::findOrFail($id);
        return view('estados.show', compact('estado'));
    }

    public function edit($id)
    {
        $estado = Estados::findOrFail($id);
        return view('estados.edit', compact('estado'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NombreEstado' => 'required|string|max:100',
            'Status' => 'required|integer',
        ]);

        $estado = Estados::findOrFail($id);
        $estado->update($request->all());

        return redirect()->route('estados.index')->with('success', 'Estado actualizado correctamente.');
    }

    public function destroy($id)
    {
        $estado = Estados::findOrFail($id);
        $estado->delete();

        return redirect()->route('estados.index')->with('success', 'Estado eliminado correctamente.');
    }
}
