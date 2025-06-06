<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipios;
use App\Models\Estados;

class MunicipiosController extends Controller
{
    public function index()
    {
        $municipios = Municipios::with('estado')->get();
        return view('municipios.index', compact('municipios'));
    }

    public function create()
    {
        $estados = Estados::all();
        return view('municipios.create', compact('estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NombreMunicipio' => 'required|string|max:100',
            'ID_Estado' => 'required|exists:estados,ID_Estado',
            'Status' => 'required|integer',
        ]);

        Municipios::create($request->all());

        return redirect()->route('municipios.index')->with('success', 'Municipio creado correctamente.');
    }

    public function show($id)
    {
        $municipio = Municipios::with('estado')->findOrFail($id);
        return view('municipios.show', compact('municipio'));
    }

    public function edit($id)
    {
        $municipio = Municipios::findOrFail($id);
        $estados = Estados::all();
        return view('municipios.edit', compact('municipio', 'estados'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NombreMunicipio' => 'required|string|max:100',
            'ID_Estado' => 'required|exists:estados,ID_Estado',
            'Status' => 'required|integer',
        ]);

        $municipio = Municipios::findOrFail($id);
        $municipio->update($request->all());

        return redirect()->route('municipios.index')->with('success', 'Municipio actualizado correctamente.');
    }

    public function destroy($id)
    {
        $municipio = Municipios::findOrFail($id);
        $municipio->delete();

        return redirect()->route('municipios.index')->with('success', 'Municipio eliminado correctamente.');
    }
}
