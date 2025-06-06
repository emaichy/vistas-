<?php

namespace App\Http\Controllers;

use App\Models\Semestre;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
    public function index()
    {
        $semestres = Semestre::all();
        return view('semestres.index', compact('semestres'));
    }

    public function create()
    {
        return view('semestres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Semestre' => 'required|string|max:255',
            'Status' => 'required|integer',
        ]);

        Semestre::create($request->all());

        return redirect()->route('semestres.index')->with('success', 'Semestre creado exitosamente.');
    }

    public function show(Semestre $semestre)
    {
        return view('semestres.show', compact('semestre'));
    }

    public function edit(Semestre $semestre)
    {
        return view('semestres.edit', compact('semestre'));
    }

    public function update(Request $request, Semestre $semestre)
    {
        $request->validate([
            'Semestre' => 'required|string|max:255',
            'Status' => 'required|integer',
        ]);

        $semestre->update($request->all());

        return redirect()->route('semestres.index')->with('success', 'Semestre actualizado exitosamente.');
    }

    public function destroy(Semestre $semestre)
    {
        $semestre->delete();

        return redirect()->route('semestres.index')->with('success', 'Semestre eliminado correctamente.');
    }
}
