@php
    $isEdit = isset($grupo);
@endphp

<div class="row">
    <div class="col-md-4 mb-3">
        <label>Nombre del Grupo</label>
        <input type="text" name="NombreGrupo" class="form-control" required maxlength="100" value="{{ old('NombreGrupo', $grupo->NombreGrupo ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label>Maestro</label>
        <select name="ID_Maestro" class="form-control" required>
            <option value="">Selecciona un maestro</option>
            @foreach($maestros as $maestro)
                <option value="{{ $maestro->ID_Maestro }}" {{ old('ID_Maestro', $grupo->ID_Maestro ?? '') == $maestro->ID_Maestro ? 'selected' : '' }}>
                    {{ $maestro->Nombre }} {{ $maestro->ApePaterno }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label>Semestre</label>
        <select name="ID_Semestre" class="form-control" required>
            <option value="">Selecciona un semestre</option>
            @foreach($semestres as $semestre)
                <option value="{{ $semestre->ID_Semestre }}" {{ old('ID_Semestre', $grupo->ID_Semestre ?? '') == $semestre->ID_Semestre ? 'selected' : '' }}>
                    {{ $semestre->Semestre }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-3">
        <label>Status</label>
        <input type="number" name="Status" class="form-control" value="{{ old('Status', $grupo->Status ?? 1) }}">
    </div>
</div>
