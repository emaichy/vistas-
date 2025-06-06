<?php

namespace App\Http\Controllers;

use App\Models\Grupos;
use App\Models\Maestros;
use App\Models\Semestre;
use Illuminate\Http\Request;

class GruposController extends Controller
{
    public function index()
    {
        $grupos = Grupos::with(['maestro', 'semestre'])->get();
        return view('grupos.index', compact('grupos'));
    }

    public function create()
    {
        $maestros = Maestros::all();
        $semestres = Semestre::all();
        return view('grupos.create', compact('maestros', 'semestres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NombreGrupo' => 'required|string|max:100',
            'ID_Maestro' => 'required|exists:maestros,ID_Maestro',
            'ID_Semestre' => 'required|exists:semestres,ID_Semestre',
            'Status' => 'required|integer'
        ]);

        Grupos::create($request->all());

        return redirect()->route('grupos.index')->with('success', 'Grupo creado exitosamente.');
    }

    public function show($id)
    {
        $grupo = Grupos::with(['maestro', 'semestre'])->findOrFail($id);
        return view('grupos.show', compact('grupo'));
    }

    public function edit($id)
    {
        $grupo = Grupos::findOrFail($id);
        $maestros = Maestros::all();
        $semestres = Semestre::all();
        return view('grupos.edit', compact('grupo', 'maestros', 'semestres'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NombreGrupo' => 'required|string|max:100',
            'ID_Maestro' => 'required|exists:maestros,ID_Maestro',
            'ID_Semestre' => 'required|exists:semestres,ID_Semestre',
            'Status' => 'required|integer'
        ]);

        $grupo = Grupos::findOrFail($id);
        $grupo->update($request->all());

        return redirect()->route('grupos.index')->with('success', 'Grupo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $grupo = Grupos::findOrFail($id);
        $grupo->delete();

        return redirect()->route('grupos.index')->with('success', 'Grupo eliminado correctamente.');
    }
}
