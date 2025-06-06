@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Crear Usuario</h2>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="Correo" class="form-label">Correo</label>
            <input type="email" name="Correo" id="Correo" class="form-control" required value="{{ old('Correo') }}">
        </div>

        <div class="mb-3">
            <label for="Contrasena" class="form-label">Contraseña</label>
            <input type="password" name="Contrasena" id="Contrasena" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Rol" class="form-label">Rol</label>
            <select name="Rol" id="Rol" class="form-control" required>
                <option value="">Selecciona un rol</option>
                <option value="1" {{ old('Rol') == 1 ? 'selected' : '' }}>Estudiante</option>
                <option value="2" {{ old('Rol') == 2 ? 'selected' : '' }}>Maestro</option>
                <option value="3" {{ old('Rol') == 3 ? 'selected' : '' }}>Administrador</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="Status" class="form-label">Status</label>
            <input type="number" name="Status" id="Status" class="form-control" value="{{ old('Status', 1) }}">
        </div>

        <div class="text-end mt-3">
            <button class="btn btn-success">Guardar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
