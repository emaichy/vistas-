<?php

namespace App\Http\Controllers;

use App\Models\Consentimiento;
use App\Models\Alumnos;
use App\Models\Pacientes;
use App\Models\Expediente;
use App\Models\Semestre;
use App\Models\Grupos;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class ConsentimientoController extends Controller
{
    public function index()
    {
        $consentimientos = Consentimiento::with(['alumno', 'paciente', 'expediente', 'semestre', 'grupo'])->get();
        return view('consentimiento.index', compact('consentimientos'));
    }

    public function create()
    {
        return view('consentimiento.create', [
            'alumnos' => Alumnos::all(),
            'pacientes' => Pacientes::all(),
            'expedientes' => Expediente::all(),
            'semestres' => Semestre::all(),
            'grupos' => Grupos::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ID_Alumno' => 'required|exists:alumnos,Matricula',
            'ID_Paciente' => 'required|exists:pacientes,ID_Paciente',
            'ID_Expediente' => 'required|exists:expedientes,ID_Expediente',
            'ID_Semestre' => 'nullable|exists:semestres,ID_Semestre',
            'ID_Grupo' => 'nullable|exists:grupos,ID_Grupo',
            'fecha' => 'required|date',
            'descripcion_tratamiento' => 'required|string',
            'alumno_tratante' => 'required|string',
            'docentes' => 'required|string',
            'declaracion' => 'required|string',
            'nombre_paciente' => 'nullable|string',
            'nombre_alumno' => 'nullable|string',
            'nombre_docentes' => 'nullable|string',
            'nombre_testigo' => 'nullable|string',
            'firma_paciente' => 'nullable|string',
            'firma_alumno' => 'nullable|string',
            'firma_docentes' => 'nullable|string',
            'firma_testigo' => 'nullable|string',
        ]);

        $consentimiento = Consentimiento::create($data);

        // Cargar relaciones necesarias para el PDF
        $consentimiento->load(['alumno', 'paciente', 'expediente', 'semestre', 'grupo']);

        $pdf = Pdf::loadView('consentimiento.pdf', ['consentimiento' => $consentimiento]);
        $pdfPath = 'consentimientos/consentimiento_' . $consentimiento->id . '.pdf';
        Storage::disk('public')->put($pdfPath, $pdf->output());

        $consentimiento->pdf_document = $pdfPath;
        $consentimiento->save();

        return redirect()->route('consentimiento.index')->with('success', 'Carta de consentimiento guardada correctamente.');
    }

    public function show(Consentimiento $consentimiento)
    {
        return view('consentimiento.show', [
            'consentimiento' => $consentimiento->load(['alumno', 'paciente', 'expediente', 'semestre', 'grupo'])
        ]);
    }

    public function edit(Consentimiento $consentimiento)
    {
        return view('consentimiento.edit', [
            'consentimiento' => $consentimiento,
            'alumnos' => Alumnos::all(),
            'pacientes' => Pacientes::all(),
            'expedientes' => Expediente::all(),
            'semestres' => Semestre::all(),
            'grupos' => Grupos::all()
        ]);
    }

    public function update(Request $request, Consentimiento $consentimiento)
    {
        $data = $request->validate([
            'ID_Alumno' => 'required|exists:alumnos,Matricula',
            'ID_Paciente' => 'required|exists:pacientes,ID_Paciente',
            'ID_Expediente' => 'required|exists:expedientes,ID_Expediente',
            'ID_Semestre' => 'nullable|exists:semestres,ID_Semestre',
            'ID_Grupo' => 'nullable|exists:grupos,ID_Grupo',
            'fecha' => 'required|date',
            'descripcion_tratamiento' => 'required|string',
            'alumno_tratante' => 'required|string',
            'docentes' => 'required|string',
            'declaracion' => 'required|string',
            'nombre_paciente' => 'nullable|string',
            'nombre_alumno' => 'nullable|string',
            'nombre_docentes' => 'nullable|string',
            'nombre_testigo' => 'nullable|string',
            'firma_paciente' => 'nullable|string',
            'firma_alumno' => 'nullable|string',
            'firma_docentes' => 'nullable|string',
            'firma_testigo' => 'nullable|string',
        ]);

        // Eliminar PDF anterior si existe
        if ($consentimiento->pdf_document && Storage::disk('public')->exists($consentimiento->pdf_document)) {
            Storage::disk('public')->delete($consentimiento->pdf_document);
        }

        $consentimiento->update($data);

        // Cargar relaciones necesarias para el PDF
        $consentimiento->load(['alumno', 'paciente', 'expediente', 'semestre', 'grupo']);

        $pdf = Pdf::loadView('consentimiento.pdf', ['consentimiento' => $consentimiento]);
        $pdfPath = 'consentimientos/consentimiento_' . $consentimiento->id . '.pdf';
        Storage::disk('public')->put($pdfPath, $pdf->output());

        $consentimiento->pdf_document = $pdfPath;
        $consentimiento->save();

        return redirect()->route('consentimiento.index')->with('success', 'Carta de consentimiento actualizada correctamente.');
    }

    public function destroy(Consentimiento $consentimiento)
    {
        if ($consentimiento->pdf_document && Storage::disk('public')->exists($consentimiento->pdf_document)) {
            Storage::disk('public')->delete($consentimiento->pdf_document);
        }

        $consentimiento->delete();

        return redirect()->route('consentimiento.index')->with('success', 'Carta de consentimiento eliminada.');
    }
}
