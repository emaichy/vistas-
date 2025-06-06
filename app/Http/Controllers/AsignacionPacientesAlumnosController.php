<?php

namespace App\Http\Controllers;

use App\Models\AsignacionPacientesAlumnos;
use App\Models\Alumnos;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class AsignacionPacientesAlumnosController extends Controller
{
    public function index()
    {
        $asignaciones = AsignacionPacientesAlumnos::with('alumno', 'paciente')->get();
        return view('asignaciones.index', compact('asignaciones'));
    }

    public function create()
    {
        $alumnos = Alumnos::all();
        $pacientes = Pacientes::all();
        return view('asignaciones.create', compact('alumnos', 'pacientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ID_Alumno' => 'required|exists:alumnos,Matricula',
            'ID_Paciente' => 'required|exists:pacientes,ID_Paciente',
            'Status' => 'required|string|max:20',
        ]);

        AsignacionPacientesAlumnos::create($request->all());
        return redirect()->route('asignaciones.index')->with('success', 'Asignación creada exitosamente.');
    }

    public function show($id)
    {
        $asignacion = AsignacionPacientesAlumnos::with('alumno', 'paciente')->findOrFail($id);
        return view('asignaciones.show', compact('asignacion'));
    }

    public function edit($id)
    {
        $asignacion = AsignacionPacientesAlumnos::findOrFail($id);
        $alumnos = Alumnos::all();
        $pacientes = Pacientes::all();
        return view('asignaciones.edit', compact('asignacion', 'alumnos', 'pacientes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_Alumno' => 'required|exists:alumnos,Matricula',
            'ID_Paciente' => 'required|exists:pacientes,ID_Paciente',
            'Status' => 'required|string|max:20',
        ]);

        $asignacion = AsignacionPacientesAlumnos::findOrFail($id);
        $asignacion->update($request->all());

        return redirect()->route('asignaciones.index')->with('success', 'Asignación actualizada.');
    }

    public function destroy($id)
    {
        $asignacion = AsignacionPacientesAlumnos::findOrFail($id);
        $asignacion->delete();

        return redirect()->route('asignaciones.index')->with('success', 'Asignación eliminada.');
    }
}
