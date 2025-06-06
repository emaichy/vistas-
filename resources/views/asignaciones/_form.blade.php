<div class="mb-3">
    <label for="ID_Alumno" class="form-label">Alumno</label>
    <select name="ID_Alumno" class="form-control" required>
        <option value="">Selecciona un alumno</option>
        @foreach($alumnos as $alumno)
            <option value="{{ $alumno->Matricula }}"
                {{ old('ID_Alumno', $asignacion->ID_Alumno ?? '') == $alumno->Matricula ? 'selected' : '' }}>
                {{ $alumno->Nombre }} ({{ $alumno->Matricula }})
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="ID_Paciente" class="form-label">Paciente</label>
    <select name="ID_Paciente" class="form-control" required>
        <option value="">Selecciona un paciente</option>
        @foreach($pacientes as $paciente)
            <option value="{{ $paciente->ID_Paciente }}"
                {{ old('ID_Paciente', $asignacion->ID_Paciente ?? '') == $paciente->ID_Paciente ? 'selected' : '' }}>
                {{ $paciente->Nombre }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="Status" class="form-label">Status</label>
    <input type="text" name="Status" class="form-control" required
        value="{{ old('Status', $asignacion->Status ?? '') }}">
</div>
