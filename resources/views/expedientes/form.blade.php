<div class="row">
    <div class="col-md-6 mb-3">
        <label>Paciente</label>
        <select name="ID_Paciente" class="form-control" required>
            <option value="">Selecciona un paciente</option>
            @foreach($pacientes as $paciente)
                <option value="{{ $paciente->ID_Paciente }}" {{ old('ID_Paciente', $expediente->ID_Paciente ?? '') == $paciente->ID_Paciente ? 'selected' : '' }}>
                    {{ $paciente->Nombre }} {{ $paciente->ApePaterno }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label>Alumno</label>
        <select name="ID_Alumno" class="form-control" required>
            <option value="">Selecciona un alumno</option>
            @foreach($alumnos as $alumno)
                <option value="{{ $alumno->Matricula }}" {{ old('ID_Alumno', $expediente->ID_Alumno ?? '') == $alumno->Matricula ? 'selected' : '' }}>
                    {{ $alumno->Nombre }} ({{ $alumno->Matricula }})
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label>Tipo de Expediente</label>
        <select name="TipoExpediente" class="form-control" required>
            <option value="">Selecciona un tipo</option>
            <option value="1" {{ old('TipoExpediente', $expediente->TipoExpediente ?? '') == '1' ? 'selected' : '' }}>Adulto</option>
            <option value="2" {{ old('TipoExpediente', $expediente->TipoExpediente ?? '') == '2' ? 'selected' : '' }}>Infantil</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label>Status</label>
        <select name="Status" class="form-control" required>
            <option value="1" {{ old('Status', $expediente->Status ?? '') == 1 ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ old('Status', $expediente->Status ?? '') == 0 ? 'selected' : '' }}>Inactivo</option>
            <option value="2" {{ old('Status', $expediente->Status ?? '') == 2 ? 'selected' : '' }}>Finalizado</option>
        </select>
    </div>
</div>
