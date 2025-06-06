@csrf
<div class="mb-3">
    <label>Correo</label>
    <input type="email" name="Correo" class="form-control" required value="{{ old('Correo', $usuario->Correo ?? '') }}">
</div>

<div class="mb-3">
    <label>Contraseña {{ isset($usuario) ? '(dejar vacío para no cambiar)' : '' }}</label>
    <input type="password" name="Contrasena" class="form-control" {{ isset($usuario) ? '' : 'required' }}>
</div>

<div class="mb-3">
    <label>Rol</label>
    <input type="text" name="Rol" class="form-control" required value="{{ old('Rol', $usuario->Rol ?? '') }}">
</div>

<div class="mb-3">
    <label>Status</label>
    <input type="number" name="Status" class="form-control" required value="{{ old('Status', $usuario->Status ?? 1) }}">
</div>
