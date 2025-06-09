<?php

namespace App\Http\Controllers;

use App\Models\NotaEvolucion;
use App\Models\Alumnos;
use App\Models\Pacientes;
use App\Models\Expediente;
use App\Models\Semestre;
use App\Models\Grupos;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class NotasEvolucionController extends Controller
{
    public function index()
    {
        $notas = NotaEvolucion::with(['alumno', 'paciente', 'expediente', 'semestre', 'grupo'])->get();
        return view('notasevolucion.index', compact('notas'));
    }

    public function create()
    {
        return view('notasevolucion.create', [
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
            'ID_Alumno' => 'required|exists:alumnos,ID_Alumno',
            'ID_Paciente' => 'required|exists:pacientes,ID_Paciente',
            'ID_Expediente' => 'required|exists:expedientes,ID_Expediente',
            'ID_Semestre' => 'required|exists:semestres,ID_Semestre',
            'ID_Grupo' => 'required|exists:grupos,ID_Grupo',
            'fecha' => 'required|date',
            'presion_arterial' => 'nullable|string|max:255',
            'frecuencia_cardiaca' => 'nullable|string|max:255',
            'frecuencia_respiratoria' => 'nullable|string|max:255',
            'temperatura' => 'nullable|string|max:255',
            'oximetria' => 'nullable|string|max:255',
            'tratamiento_realizado' => 'nullable|string',
            'descripcion_tratamiento' => 'nullable|string',
            'firma_catedratico' => 'nullable|string',
            'firma_alumno' => 'nullable|string',
            'firma_paciente' => 'nullable|string',
        ]);

        $nota = NotaEvolucion::create($data);

        // Generar PDF
        $pdf = Pdf::loadView('notasevolucion.pdf', ['nota' => $nota]);
        $pdfPath = 'notas_evolucion/nota_' . $nota->ID_Nota . '.pdf';
        Storage::disk('public')->put($pdfPath, $pdf->output());
        $nota->pdf_document = $pdfPath;
        $nota->save();

        return redirect()->route('notasevolucion.index')->with('success', 'Nota de evolución guardada correctamente.');
    }

    public function show(NotaEvolucion $notasevolucion)
    {
        return view('notasevolucion.show', [
            'nota' => $notasevolucion->load(['alumno', 'paciente', 'expediente', 'semestre', 'grupo'])
        ]);
    }

    public function edit(NotaEvolucion $notasevolucion)
    {
        return view('notasevolucion.edit', [
            'nota' => $notasevolucion,
            'alumnos' => Alumnos::all(),
            'pacientes' => Pacientes::all(),
            'expedientes' => Expediente::all(),
            'semestres' => Semestre::all(),
            'grupos' => Grupos::all()
        ]);
    }

    public function update(Request $request, NotaEvolucion $notasevolucion)
    {
        $data = $request->validate([
            'ID_Alumno' => 'required|exists:alumnos,ID_Alumno',
            'ID_Paciente' => 'required|exists:pacientes,ID_Paciente',
            'ID_Expediente' => 'required|exists:expedientes,ID_Expediente',
            'ID_Semestre' => 'required|exists:semestres,ID_Semestre',
            'ID_Grupo' => 'required|exists:grupos,ID_Grupo',
            'fecha' => 'required|date',
            'presion_arterial' => 'nullable|string|max:255',
            'frecuencia_cardiaca' => 'nullable|string|max:255',
            'frecuencia_respiratoria' => 'nullable|string|max:255',
            'temperatura' => 'nullable|string|max:255',
            'oximetria' => 'nullable|string|max:255',
            'tratamiento_realizado' => 'nullable|string',
            'descripcion_tratamiento' => 'nullable|string',
            'firma_catedratico' => 'nullable|string',
            'firma_alumno' => 'nullable|string',
            'firma_paciente' => 'nullable|string',
        ]);

        $notasevolucion->update($data);

        // Regenerar PDF
        $pdf = Pdf::loadView('notasevolucion.pdf', ['nota' => $notasevolucion]);
        $pdfPath = 'notas_evolucion/nota_' . $notasevolucion->ID_Nota . '.pdf';
        Storage::disk('public')->put($pdfPath, $pdf->output());
        $notasevolucion->pdf_document = $pdfPath;
        $notasevolucion->save();

        return redirect()->route('notasevolucion.index')->with('success', 'Nota de evolución actualizada correctamente.');
    }

    public function destroy(NotaEvolucion $notasevolucion)
    {
        if ($notasevolucion->pdf_document) {
            Storage::disk('public')->delete($notasevolucion->pdf_document);
        }
        $notasevolucion->delete();

        return redirect()->route('notasevolucion.index')->with('success', 'Nota de evolución eliminada.');
    }
}
