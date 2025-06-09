<?php

namespace App\Http\Controllers;

use App\Models\DocumentosPacientes;
use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentosPacientesController extends Controller
{
    public function index()
    {
        $documentos = DocumentosPacientes::with('paciente')->get();
        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        $pacientes = Pacientes::all();
        return view('documentos.create', compact('pacientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Tipo' => 'required|string|in:INE,ComprobanteDomicilio,CURP,Otro',
            'ID_Paciente' => 'required|exists:pacientes,ID_Paciente',
            'RutaArchivo' => 'nullable|file|mimes:pdf,jpg,png,doc,docx|max:2048',
        ]);

        $documento = new DocumentosPacientes();
        $documento->Tipo = $request->Tipo;
        $documento->ID_Paciente = $request->ID_Paciente;

        if ($request->hasFile('RutaArchivo')) {
            $documento->RutaArchivo = $request->file('RutaArchivo')->store('documentos_pacientes' , 'public');
        }

        $documento->save();

        return redirect()->route('documentos.index')->with('success', 'Documento agregado correctamente.');
    }

    public function show(DocumentosPacientes $documento)
    {
        return view('documentos.show', compact('documento'));
    }

    public function edit(DocumentosPacientes $documento)
    {
        $pacientes = Pacientes::all();
        return view('documentos.edit', compact('documento', 'pacientes'));
    }

    public function update(Request $request, DocumentosPacientes $documento)
    {
        $request->validate([
            'Tipo' => 'required|string|in:INE,ComprobanteDomicilio,CURP,Otro',
            'ID_Paciente' => 'required|exists:pacientes,ID_Paciente',
            'RutaArchivo' => 'nullable|file|mimes:pdf,jpg,png,doc,docx|max:2048',
        ]);

        $documento->Tipo = $request->Tipo;
        $documento->ID_Paciente = $request->ID_Paciente;

        if ($request->hasFile('RutaArchivo')) {
            if ($documento->RutaArchivo) {
                Storage::delete($documento->RutaArchivo); // Eliminar el archivo anterior
            }
            $documento->RutaArchivo = $request->file('RutaArchivo')->store('documentos_pacientes');
        }

        $documento->save();

        return redirect()->route('documentos.index')->with('success', 'Documento actualizado correctamente.');
    }

    public function destroy(DocumentosPacientes $documento)
    {
        if ($documento->RutaArchivo) {
            Storage::delete($documento->RutaArchivo); // Eliminar el archivo
        }
        $documento->delete();

        return redirect()->route('documentos.index')->with('success', 'Documento eliminado correctamente.');
    }
}
