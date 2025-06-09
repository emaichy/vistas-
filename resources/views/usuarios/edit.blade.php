@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Usuario</h2>
    <form action="{{ route('usuarios.update', $usuario->ID_Usuario) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="Correo" class="form-label">Correo</label>
            <input type="email" name="Correo" id="Correo" class="form-control" required 
                value="{{ old('Correo', $usuario->Correo) }}">
        </div>

        <div class="mb-3">
            <label for="Contrasena" class="form-label">Contraseña (deja vacío para no cambiar)</label>
            <input type="password" name="Contrasena" id="Contrasena" class="form-control">
        </div>

        <div class="mb-3">
            <label for="Rol" class="form-label">Rol</label>
            <select name="Rol" id="Rol" class="form-control" required>
                <option value="">Selecciona un rol</option>
                <option value="1" {{ old('Rol', $usuario->Rol) == 1 ? 'selected' : '' }}>Estudiante</option>
                <option value="2" {{ old('Rol', $usuario->Rol) == 2 ? 'selected' : '' }}>Maestro</option>
                <option value="3" {{ old('Rol', $usuario->Rol) == 3 ? 'selected' : '' }}>Administrador</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="Status" class="form-label">Status</label>
            <select name="Status" id="Status" class="form-control" required>
                <option value="1" {{ old('Status', $usuario->Status) == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('Status', $usuario->Status) == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <div class="text-end mt-3">
            <button class="btn btn-success">Actualizar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
