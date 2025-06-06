<?php

namespace App\Http\Controllers;

use App\Models\Maestros;
use App\Models\Usuarios;
use App\Models\Estados;
use App\Models\Municipios;
use Illuminate\Http\Request;

class MaestrosController extends Controller
{
    public function index()
    {
        $maestros = Maestros::with('usuario', 'estado', 'municipio')->get();
        return view('maestros.index', compact('maestros'));
    }

    public function create()
    {
        $usuarios = Usuarios::all();
        $estados = Estados::all();
        $municipios = Municipios::all();
        return view('maestros.create', compact('usuarios', 'estados', 'municipios'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nombre' => 'required|string|max:80',
            'ApePaterno' => 'required|string|max:50',
            'ApeMaestro' => 'required|string|max:50',
            'Especialidad' => 'required|string|max:100',
            'FechaNac' => 'required|date',
            'Sexo' => 'required',
            'Telefono' => 'nullable|string|max:20',
            'ID_Usuario' => 'required|exists:usuarios,ID_Usuario',
            'ID_Estado' => 'required',
            'ID_Municipio' => 'required',
        ]);

        $data = $request->except(['Firma']);
        if ($request->hasFile('Firma')) {
            $data['Firma'] = $request->file('Firma')->store('firmas', 'public');
        }

        Maestros::create($data);
        return redirect()->route('maestros.index')->with('success', 'Maestro creado correctamente.');
    }

    public function show($id)
    {
        $maestro = Maestros::with('usuario', 'estado', 'municipio')->findOrFail($id);
        return view('maestros.show', compact('maestro'));
    }

    public function edit($id)
    {
        $maestro = Maestros::findOrFail($id);
        $usuarios = Usuarios::all();
        $estados = Estados::all();
        $municipios = Municipios::all();
        return view('maestros.edit', compact('maestro', 'usuarios', 'estados', 'municipios'));
    }

    public function update(Request $request, $id)
    {
        $maestro = Maestros::findOrFail($id);

        $validated = $request->validate([
            'Nombre' => 'required|string|max:80',
            'ApePaterno' => 'required|string|max:50',
            'ApeMaestro' => 'required|string|max:50',
            'Especialidad' => 'required|string|max:100',
            'FechaNac' => 'required|date',
            'Sexo' => 'required',
            'Telefono' => 'nullable|string|max:20',
            'ID_Usuario' => 'required|exists:usuarios,ID_Usuario',
            'ID_Estado' => 'required',
            'ID_Municipio' => 'required',
        ]);

        $data = $request->except(['Firma']);
        if ($request->hasFile('Firma')) {
            $data['Firma'] = $request->file('Firma')->store('firmas', 'public');
        }

        $maestro->update($data);
        return redirect()->route('maestros.index')->with('success', 'Maestro actualizado correctamente.');
    }

    public function destroy($id)
    {
        $maestro = Maestros::findOrFail($id);
        $maestro->delete();
        return redirect()->route('maestros.index')->with('success', 'Maestro eliminado correctamente.');
    }
}
