<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\Pacientes;
use App\Models\Alumnos;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    public function index()
    {
        $expedientes = Expediente::with('paciente', 'alumno')->get();
        return view('expedientes.index', compact('expedientes'));
    }

    public function create()
    {
        $pacientes = Pacientes::all();
        $alumnos = Alumnos::all();
        return view('expedientes.create', compact('pacientes', 'alumnos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_Paciente' => 'required|exists:pacientes,ID_Paciente',
            'ID_Alumno' => 'required|exists:alumnos,Matricula',
            'TipoExpediente' => 'required|string|max:100',
            'Status' => 'required|integer',
        ]);

        Expediente::create($request->all());
        return redirect()->route('expedientes.index')->with('success', 'Expediente creado exitosamente.');
    }

    public function show($id)
    {
        $expediente = Expediente::with('paciente', 'alumno', 'anexos')->findOrFail($id);
        return view('expedientes.show', compact('expediente'));
    }

    public function edit($id)
    {
        $expediente = Expediente::findOrFail($id);
        $pacientes = Pacientes::all();
        $alumnos = Alumnos::all();
        return view('expedientes.edit', compact('expediente', 'pacientes', 'alumnos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_Paciente' => 'required|exists:pacientes,ID_Paciente',
            'ID_Alumno' => 'required|exists:alumnos,Matricula',
            'TipoExpediente' => 'required|string|max:100',
            'Status' => 'required|integer',
        ]);

        $expediente = Expediente::findOrFail($id);
        $expediente->update($request->all());

        return redirect()->route('expedientes.index')->with('success', 'Expediente actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $expediente = Expediente::findOrFail($id);
        $expediente->delete();
        return redirect()->route('expedientes.index')->with('success', 'Expediente eliminado.');
    }
}
