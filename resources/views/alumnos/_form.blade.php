@php
    $isEdit = isset($alumno);
@endphp

<div class="row">
    <div class="col-md-4 mb-3">
        <label>Nombre</label>
        <input type="text" name="Nombre" class="form-control" required maxlength="80" value="{{ old('Nombre', $alumno->Nombre ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label>Apellido Paterno</label>
        <input type="text" name="ApePaterno" class="form-control" required maxlength="50" value="{{ old('ApePaterno', $alumno->ApePaterno ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label>Apellido Materno</label>
        <input type="text" name="ApeMaterno" class="form-control" required maxlength="50" value="{{ old('ApeMaterno', $alumno->ApeMaterno ?? '') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-3">
        <label>Fecha de Nacimiento</label>
        <input type="date" name="FechaNac" class="form-control" required value="{{ old('FechaNac', $alumno->FechaNac ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label>Sexo</label>
        <select name="Sexo" class="form-control" required>
            <option value="">Selecciona</option>
            <option value="Masculino" {{ old('Sexo', $alumno->Sexo ?? '') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="Femenino" {{ old('Sexo', $alumno->Sexo ?? '') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
        </select>
    </div>
    <div class="col-md-3 mb-3">
        <label>Teléfono</label>
        <input type="text" name="Telefono" class="form-control" maxlength="20" value="{{ old('Telefono', $alumno->Telefono ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label>CURP</label>
        <input type="text" name="Curp" class="form-control" maxlength="18" value="{{ old('Curp', $alumno->Curp ?? '') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label>Dirección</label>
        <input type="text" name="Direccion" class="form-control" maxlength="100" value="{{ old('Direccion', $alumno->Direccion ?? '') }}">
    </div>
    <div class="col-md-2 mb-3">
        <label>Número Exterior</label>
        <input type="text" name="NumeroExterior" class="form-control" maxlength="10" value="{{ old('NumeroExterior', $alumno->NumeroExterior ?? '') }}">
    </div>
    <div class="col-md-2 mb-3">
        <label>Número Interior</label>
        <input type="text" name="NumeroInterior" class="form-control" maxlength="10" value="{{ old('NumeroInterior', $alumno->NumeroInterior ?? '') }}">
    </div>
    <div class="col-md-2 mb-3">
        <label>Código Postal</label>
        <input type="text" name="CodigoPostal" class="form-control" maxlength="10" value="{{ old('CodigoPostal', $alumno->CodigoPostal ?? '') }}">
    </div>
    <div class="col-md-2 mb-3">
        <label>País</label>
        <input type="text" name="Pais" class="form-control" maxlength="100" value="{{ old('Pais', $alumno->Pais ?? '') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label>Tipo de Alumno</label>
        <input type="text" name="TipoAlumno" class="form-control" maxlength="20" value="{{ old('TipoAlumno', $alumno->TipoAlumno ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label>Foto del Alumno</label>
        <input type="file" name="Foto_Alumno" class="form-control">
        @if($isEdit && $alumno->Foto_Alumno)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $alumno->Foto_Alumno) }}" width="80" height="80" alt="Foto actual">
            </div>
        @endif
    </div>
    <div class="col-md-4 mb-3">
        <label>Firma</label>
        <input type="file" name="Firma" class="form-control">
        @if($isEdit && $alumno->Firma)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $alumno->Firma) }}" width="80" height="80" alt="Firma actual">
            </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label>Estado</label>
        <select name="ID_Estado" class="form-control" required>
            <option value="">Selecciona un estado</option>
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
            <option value="">Selecciona un municipio</option>
            @foreach($municipios as $municipio)
                <option value="{{ $municipio->ID_Municipio }}" {{ old('ID_Municipio', $alumno->ID_Municipio ?? '') == $municipio->ID_Municipio ? 'selected' : '' }}>
                    {{ $municipio->NombreMunicipio }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label>Grupo</label>
        <select name="ID_Grupo" class="form-control" required>
            <option value="">Selecciona un grupo</option>
            @foreach($grupos as $grupo)
                <option value="{{ $grupo->ID_Grupo }}" {{ old('ID_Grupo', $alumno->ID_Grupo ?? '') == $grupo->ID_Grupo ? 'selected' : '' }}>
                    {{ $grupo->NombreGrupo }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label>Usuario</label>
        <select name="ID_Usuario" class="form-control" required>
            <option value="">Selecciona un usuario</option>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->ID_Usuario }}" {{ old('ID_Usuario', $alumno->ID_Usuario ?? '') == $usuario->ID_Usuario ? 'selected' : '' }}>
                    {{ $usuario-> Correo}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label>Status</label>
  <label>Status</label>
<select name="Status" class="form-control" required>
    <option value="1" {{ old('Status', $alumno->Status ?? 1) == 1 ? 'selected' : '' }}>Activo</option>
    <option value="0" {{ old('Status', $alumno->Status ?? 1) == 0 ? 'selected' : '' }}>Inactivo</option>
</select>



    </div>
</div>
