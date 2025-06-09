<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacientes;
use App\Models\Estados;
use App\Models\Municipios;

class PacientesController extends Controller
{
    public function index()
    {
        $pacientes = Pacientes::with('estado', 'municipio')->get();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        $estados = Estados::all();
        $municipios = Municipios::all();
        return view('pacientes.create', compact('estados', 'municipios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|max:80',
            'ApePaterno' => 'required|max:50',
            'ApeMaterno' => 'required|max:50',
            'FechaNac' => 'required|date',
            'Sexo' => 'nullable|in:Masculino,Femenino',
            'Direccion' => 'nullable|max:100',
            'NumeroExterior' => 'nullable|max:10',
            'NumeroInterior' => 'nullable|max:10',
            'CodigoPostal' => 'nullable|max:10',
            'Pais' => 'required|max:100',
            'TipoPaciente' => 'required|max:15',
            'Foto_Paciente' => 'nullable|image|max:2048',
            'ID_Estado' => 'required|exists:estados,ID_Estado',
            'ID_Municipio' => 'required|exists:municipios,ID_Municipio',
        ]);

        $paciente = new Pacientes($request->except('Foto_Paciente'));

        if ($request->hasFile('Foto_Paciente')) {
            $foto = $request->file('Foto_Paciente')->store('fotos_pacientes', 'public');
            $paciente->Foto_Paciente = $foto;
        }

        $paciente->save();

        return redirect()->route('pacientes.index')->with('success', 'Paciente registrado correctamente.');
    }
    public function edit($id)
{
    $paciente = Pacientes::findOrFail($id);
    $estados = Estados::all();
    $municipios = Municipios::all();
    return view('pacientes.edit', compact('paciente', 'estados', 'municipios'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'Nombre' => 'required|max:80',
        'ApePaterno' => 'required|max:50',
        'ApeMaterno' => 'required|max:50',
        'FechaNac' => 'required|date',
        'Sexo' => 'nullable|in:Masculino,Femenino',
        'Direccion' => 'nullable|max:100',
        'NumeroExterior' => 'nullable|max:10',
        'NumeroInterior' => 'nullable|max:10',
        'CodigoPostal' => 'nullable|max:10',
        'Pais' => 'required|max:100',
        'TipoPaciente' => 'required|max:15',
        'Foto_Paciente' => 'nullable|image|max:2048',
        'ID_Estado' => 'required|exists:estados,ID_Estado',
        'ID_Municipio' => 'required|exists:municipios,ID_Municipio',
    ]);

    $paciente = Pacientes::findOrFail($id);
    $paciente->fill($request->except('Foto_Paciente'));

    if ($request->hasFile('Foto_Paciente')) {
        $foto = $request->file('Foto_Paciente')->store('fotos_pacientes', 'public');
        $paciente->Foto_Paciente = $foto;
    }

    $paciente->save();

    return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado correctamente.');
}

public function destroy($id)
{
    $paciente = Pacientes::findOrFail($id);
    $paciente->delete();

    return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado.');
}

public function show($id)
{
    $paciente = Pacientes::with('estado', 'municipio')->findOrFail($id);
    return view('pacientes.show', compact('paciente'));
}


}

