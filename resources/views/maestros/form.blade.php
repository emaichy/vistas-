@php $isEdit = isset($maestro); @endphp

<div class="row">
    <div class="col-md-4 mb-3">
        <label>Nombre</label>
        <input type="text" name="Nombre" class="form-control" required value="{{ old('Nombre', $maestro->Nombre ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label>Apellido Paterno</label>
        <input type="text" name="ApePaterno" class="form-control" required value="{{ old('ApePaterno', $maestro->ApePaterno ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label>Apellido Materno</label>
        <input type="text" name="ApeMaestro" class="form-control" required value="{{ old('ApeMaestro', $maestro->ApeMaestro ?? '') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label>Especialidad</label>
        <input type="text" name="Especialidad" class="form-control" required value="{{ old('Especialidad', $maestro->Especialidad ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label>Fecha de Nacimiento</label>
        <input type="date" name="FechaNac" class="form-control" required value="{{ old('FechaNac', $maestro->FechaNac ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label>Sexo</label>
        <select name="Sexo" class="form-control" required>
            <option value="Masculino" {{ old('Sexo', $maestro->Sexo ?? '') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="Femenino" {{ old('Sexo', $maestro->Sexo ?? '') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label>Teléfono</label>
        <input type="text" name="Telefono" class="form-control" value="{{ old('Telefono', $maestro->Telefono ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label>Firma</label>
        <input type="file" name="Firma" class="form-control">
        @if($isEdit && $maestro->Firma)
            <img src="{{ asset('storage/' . $maestro->Firma) }}" width="80" class="mt-2">
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label>Usuario</label>
        <select name="ID_Usuario" class="form-control" required>
            <option value="">Selecciona</option>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->ID_Usuario }}" {{ old('ID_Usuario', $maestro->ID_Usuario ?? '') == $usuario->ID_Usuario ? 'selected' : '' }}>
                    {{ $usuario->Correo }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label>Estado</label>
        <select name="ID_Estado" class="form-control" required>
            @foreach($estados as $estado)
                 <option value="{{ $estado->ID_Estado }}" {{ old('ID_Estado', $alumno->ID_Estado ?? '') == $estado->ID_Estado ? 'selected' : '' }}>
                    {{ $estado->NombreEstado }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label>Municipio</label>
        <select name="ID_Municipio" class="form-control" required>
            @foreach($municipios as $municipio)
                <option value="{{ $municipio->ID_Municipio }}" {{ old('ID_Municipio', $maestro->ID_Municipio ?? '') == $municipio->ID_Municipio ? 'selected' : '' }}>
                    {{ $municipio->NombreMunicipio }}
                </option>
            @endforeach
        </select>
    </div>
</div>
