@php
    $isEdit = isset($paciente);
@endphp

<div class="row">
    <div class="col-md-4 mb-3">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" class="form-control" required maxlength="80" value="{{ old('Nombre', $paciente->Nombre ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label for="ApePaterno">Apellido Paterno</label>
        <input type="text" name="ApePaterno" class="form-control" required maxlength="50" value="{{ old('ApePaterno', $paciente->ApePaterno ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label for="ApeMaterno">Apellido Materno</label>
        <input type="text" name="ApeMaterno" class="form-control" required maxlength="50" value="{{ old('ApeMaterno', $paciente->ApeMaterno ?? '') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label for="FechaNac">Fecha de Nacimiento</label>
        <input type="date" name="FechaNac" class="form-control" required value="{{ old('FechaNac', $paciente->FechaNac ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label for="Sexo">Sexo</label>
        <select name="Sexo" class="form-control" required>
            <option value="">Selecciona</option>
            <option value="Masculino" {{ old('Sexo', $paciente->Sexo ?? '') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="Femenino" {{ old('Sexo', $paciente->Sexo ?? '') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label for="TipoPaciente">Tipo de Paciente</label>
        <input type="text" name="TipoPaciente" class="form-control" required maxlength="15" value="{{ old('TipoPaciente', $paciente->TipoPaciente ?? '') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="Direccion">Dirección</label>
        <input type="text" name="Direccion" class="form-control" maxlength="100" value="{{ old('Direccion', $paciente->Direccion ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="NumeroExterior">Número Exterior</label>
        <input type="text" name="NumeroExterior" class="form-control" maxlength="10" value="{{ old('NumeroExterior', $paciente->NumeroExterior ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label for="NumeroInterior">Número Interior</label>
        <input type="text" name="NumeroInterior" class="form-control" maxlength="10" value="{{ old('NumeroInterior', $paciente->NumeroInterior ?? '') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label for="CodigoPostal">Código Postal</label>
        <input type="text" name="CodigoPostal" class="form-control" maxlength="10" value="{{ old('CodigoPostal', $paciente->CodigoPostal ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label for="Pais">País</label>
        <input type="text" name="Pais" class="form-control" required maxlength="100" value="{{ old('Pais', $paciente->Pais ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label for="Foto_Paciente">Foto del Paciente</label>
        <input type="file" name="Foto_Paciente" class="form-control">
        @if($isEdit && $paciente->Foto_Paciente)
            <div class="mt-1">
                <img src="{{ asset('storage/' . $paciente->Foto_Paciente) }}" width="80" height="80" alt="Foto actual" class="rounded border">
            </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="ID_Estado">Estado</label>
        <select name="ID_Estado" class="form-control" required>
            <option value="">Selecciona un estado</option>
            @foreach($estados as $estado)
                <option value="{{ $estado->ID_Estado }}" {{ old('ID_Estado', $paciente->ID_Estado ?? '') == $estado->ID_Estado ? 'selected' : '' }}>
                    {{ $estado->NombreEstado }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label for="ID_Municipio">Municipio</label>
        <select name="ID_Municipio" class="form-control" required>
            <option value="">Selecciona un municipio</option>
            @foreach($municipios as $municipio)
                <option value="{{ $municipio->ID_Municipio }}" {{ old('ID_Municipio', $paciente->ID_Municipio ?? '') == $municipio->ID_Municipio ? 'selected' : '' }}>
                    {{ $municipio->NombreMunicipio }}
                </option>
            @endforeach
        </select>
    </div>
</div>
