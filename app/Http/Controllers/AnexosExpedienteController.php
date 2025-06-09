<?php

namespace App\Http\Controllers;

use App\Models\AnexosExpediente;
use App\Models\Expediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnexosExpedienteController extends Controller
{
    public function index()
    {
        $anexos = AnexosExpediente::with('expediente')->get();
        return view('anexos.index', compact('anexos'));
    }

    public function create()
    {
        $expedientes = Expediente::all();
        return view('anexos.create', compact('expedientes'));
    }

public function store(Request $request)
{
    $request->validate([
        'Nombre_Anexo' => 'required|string|max:255',
        'Ruta_Anexo' => 'nullable|file|max:2048',
        'Tipo_Anexo' => 'nullable|string|max:100',
        'ID_Expediente' => 'required|exists:expedientes,ID_Expediente',
    ]);

    $anexo = new AnexosExpediente($request->except('Ruta_Anexo'));

    if ($request->hasFile('Ruta_Anexo')) {
        // Guardar el archivo en storage/app/public/anexos_expedientes
        $anexo->Ruta_Anexo = $request->file('Ruta_Anexo')->store('anexos_expedientes', 'public');
    }

    $anexo->save();

    return redirect()->route('anexos.index')->with('success', 'Anexo creado correctamente.');
}


    public function show(AnexosExpediente $anexo)
    {
        return view('anexos.show', compact('anexo'));
    }

    public function edit(AnexosExpediente $anexo)
    {
        $expedientes = Expediente::all();
        return view('anexos.edit', compact('anexo', 'expedientes'));
    }

    public function update(Request $request, AnexosExpediente $anexo)
    {
        $request->validate([
            'Nombre_Anexo' => 'required|string|max:255',
            'Ruta_Anexo' => 'nullable|file|max:2048',
            'Tipo_Anexo' => 'nullable|string|max:100',
            'ID_Expediente' => 'required|exists:expedientes,ID_Expediente',
        ]);

        $anexo->fill($request->except('Ruta_Anexo'));

        if ($request->hasFile('Ruta_Anexo')) {
            if ($anexo->Ruta_Anexo) {
                Storage::delete($anexo->Ruta_Anexo);
            }
            $anexo->Ruta_Anexo = $request->file('Ruta_Anexo')->store('anexos_expedientes');
        }

        $anexo->save();

        return redirect()->route('anexos.index')->with('success', 'Anexo actualizado correctamente.');
    }

    public function destroy(AnexosExpediente $anexo)
    {
        if ($anexo->Ruta_Anexo) {
            Storage::delete($anexo->Ruta_Anexo);
        }

        $anexo->delete();

        return redirect()->route('anexos.index')->with('success', 'Anexo eliminado correctamente.');
    }
}
