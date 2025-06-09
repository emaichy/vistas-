<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Models\Grupos;
use App\Models\Usuarios;
use App\Models\Estados;
use App\Models\Municipios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumnosController extends Controller
{
    public function index()
    {
        $alumnos = Alumnos::with(['grupo', 'usuario', 'estado', 'municipio'])->get();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        $grupos = Grupos::all();
        $usuarios = Usuarios::all();
        $estados = Estados::all();
        $municipios = Municipios::all();
        return view('alumnos.create', compact('grupos', 'usuarios', 'estados', 'municipios'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('Foto_Alumno')) {
            $data['Foto_Alumno'] = $request->file('Foto_Alumno')->store('alumnos', 'public');
        }

        if ($request->hasFile('Firma')) {
            $data['Firma'] = $request->file('Firma')->store('firmas', 'public');
        }

        Alumnos::create($data);

        return redirect()->route('alumnos.index')->with('success', 'Alumno creado correctamente.');
    }

    public function edit($id)
    {
        $alumno = Alumnos::findOrFail($id);
        $grupos = Grupos::all();
        $usuarios = Usuarios::all();
        $estados = Estados::all();
        $municipios = Municipios::all();
        return view('alumnos.edit', compact('alumno', 'grupos', 'usuarios', 'estados', 'municipios'));
    }

    public function update(Request $request, $id)
    {
        $alumno = Alumnos::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('Foto_Alumno')) {
            Storage::delete('public/' . $alumno->Foto_Alumno);
            $data['Foto_Alumno'] = $request->file('Foto_Alumno')->store('alumnos', 'public');
        }

        if ($request->hasFile('Firma')) {
            Storage::delete('public/' . $alumno->Firma);
            $data['Firma'] = $request->file('Firma')->store('firmas', 'public');
        }

        $alumno->update($data);

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente.');
    }

    public function destroy($id)
    {
        $alumno = Alumnos::findOrFail($id);

        if ($alumno->Foto_Alumno) {
            Storage::delete('public/' . $alumno->Foto_Alumno);
        }

        if ($alumno->Firma) {
            Storage::delete('public/' . $alumno->Firma);
        }

        $alumno->delete();

        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente.');
    }
    public function show($matricula)
{
    $alumno = Alumnos::with(['grupo', 'estado', 'municipio'])->findOrFail($matricula);

    return view('alumnos.show', compact('alumno'));
}

}

