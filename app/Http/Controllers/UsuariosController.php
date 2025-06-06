<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Correo' => 'required|email|unique:usuarios,Correo',
            'Contrasena' => 'required|string|min:6',
            'Rol' => 'required|string|max:50',
            'Status' => 'required|integer',
        ]);

        Usuarios::create([
            'Correo' => $request->Correo,
            'Contrasena' => Hash::make($request->Contrasena),
            'Rol' => $request->Rol,
            'Status' => $request->Status,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    public function show($id)
    {
        $usuario = Usuarios::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuarios::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuarios::findOrFail($id);

        $request->validate([
            'Correo' => 'required|email|unique:usuarios,Correo,' . $id . ',ID_Usuario',
            'Rol' => 'required|string|max:50',
            'Status' => 'required|integer',
        ]);

        $usuario->Correo = $request->Correo;
        if ($request->filled('Contrasena')) {
            $usuario->Contrasena = Hash::make($request->Contrasena);
        }
        $usuario->Rol = $request->Rol;
        $usuario->Status = $request->Status;
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        Usuarios::findOrFail($id)->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
