@extends('layouts.app')

@section('content')
<div style="text-align: left; margin-bottom: 20px;">
    <a href="{{ route('notasevolucion.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Regresar a Notas
    </a>
</div>

<div class="container" style="max-width: 1000px;">
    <form method="POST" action="{{ route('notasevolucion.update', $nota->ID_Nota) }}">
        @csrf
        @method('PUT')

        <div style="border: 2px solid #000; padding: 40px; background-color: white;">
            {{-- Encabezado --}}
            <div style="display: flex; justify-content: space-between; border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px;">
                <div>
                    <strong>Coordinación de la Licenciatura Cirujano Dentista</strong><br>
                    <small>
                        Notas de evolución | NOM-004-SSA3-2012 y NOM-013-SSA2-2015<br>
                        <span style="color: #0056b3;">Fecha de aprobación: junio 2019</span><br>
                        FO-CD-011
                    </small>
                </div>
                <div>
                    <img src="{{ asset('imagenes/logo1.png') }}" alt="Logo" style="height: 100px;">
                </div>
            </div>

            <h3 class="text-center">EDITAR NOTA DE EVOLUCIÓN</h3>

            {{-- Selección Alumno, Paciente, Semestre y Grupo --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="alumno_id">Alumno</label>
                    <select name="ID_Alumno" class="form-control" required>
                        <option value="">Selecciona un alumno</option>
                        @foreach($alumnos as $alumno)
                            <option value="{{ $alumno->Matricula }}" {{ $nota->ID_Alumno == $alumno->Matricula ? 'selected' : '' }}>
                                {{ $alumno->ApePaterno }} {{ $alumno->ApeMaterno }} {{ $alumno->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="paciente_id">Paciente</label>
                    <select name="ID_Paciente" class="form-control" required>
                        <option value="">Selecciona un paciente</option>
                        @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->ID_Paciente }}" {{ $nota->ID_Paciente == $paciente->ID_Paciente ? 'selected' : '' }}>
                                {{ $paciente->ApePaterno }} {{ $paciente->ApeMaterno }} {{ $paciente->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="expediente_id">Expediente</label>
                    <select name="ID_Expediente" class="form-control" required>
                        <option value="">Selecciona un expediente</option>
                        @foreach($expedientes as $expediente)
                            <option value="{{ $expediente->ID_Expediente }}" {{ $nota->ID_Expediente == $expediente->ID_Expediente ? 'selected' : '' }}>
                                {{ $expediente->ID_Expediente }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="semestre_id">Semestre</label>
                    <select name="ID_Semestre" class="form-control" required>
                        <option value="">Selecciona semestre</option>
                        @foreach($semestres as $semestre)
                            <option value="{{ $semestre->ID_Semestre }}" {{ $nota->ID_Semestre == $semestre->ID_Semestre ? 'selected' : '' }}>
                                {{ $semestre->Semestre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="grupo_id">Grupo</label>
                    <select name="ID_Grupo" class="form-control" required>
                        <option value="">Selecciona grupo</option>
                        @foreach($grupos as $grupo)
                            <option value="{{ $grupo->ID_Grupo }}" {{ $nota->ID_Grupo == $grupo->ID_Grupo ? 'selected' : '' }}>
                                {{ $grupo->NombreGrupo }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Fecha --}}
            <div class="mb-3">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" value="{{ old('fecha', $nota->fecha) }}" class="form-control" required>
            </div>

            {{-- Signos Vitales --}}
            <div class="row mb-3">
                <div class="col-md-2"><input type="text" name="presion_arterial" placeholder="Presión Arterial" class="form-control" value="{{ $nota->presion_arterial }}"></div>
                <div class="col-md-2"><input type="text" name="frecuencia_cardiaca" placeholder="Frec. Cardíaca" class="form-control" value="{{ $nota->frecuencia_cardiaca }}"></div>
                <div class="col-md-2"><input type="text" name="frecuencia_respiratoria" placeholder="Frec. Respiratoria" class="form-control" value="{{ $nota->frecuencia_respiratoria }}"></div>
                <div class="col-md-2"><input type="text" name="temperatura" placeholder="Temperatura" class="form-control" value="{{ $nota->temperatura }}"></div>
                <div class="col-md-2"><input type="text" name="oximetria" placeholder="Oximetría" class="form-control" value="{{ $nota->oximetria }}"></div>
            </div>

            {{-- Tratamientos --}}
            <div class="mb-3">
                <label for="tratamiento_realizado">Tratamiento Realizado</label>
                <textarea name="tratamiento_realizado" class="form-control" rows="2">{{ $nota->tratamiento_realizado }}</textarea>
            </div>

            <div class="mb-3">
                <label for="descripcion_tratamiento">Descripción del Tratamiento</label>
                <textarea name="descripcion_tratamiento" class="form-control" rows="5">{{ $nota->descripcion_tratamiento }}</textarea>
            </div>

            {{-- Firmas --}}
          {{-- Firmas --}}
<div class="row mb-4">
    @foreach(['catedratico', 'alumno', 'paciente'] as $firma)
        <div class="col-md-4 text-center">
            <label><strong>Firma {{ ucfirst($firma) }}</strong></label><br>
            <canvas id="firma_{{ $firma }}_canvas" width="300" height="100" style="border:1px solid #000;"></canvas>
            <input type="hidden" name="firma_{{ $firma }}" id="firma_{{ $firma }}_input">
            {{-- Firma previa, para conservar si no se edita --}}
            <input type="hidden" id="firma_{{ $firma }}_previa" value="{{ $nota->{'firma_'.$firma} }}">
            <button type="button" onclick="limpiarCanvas('firma_{{ $firma }}')" class="btn btn-sm btn-secondary mt-1">Limpiar</button>
        </div>
    @endforeach
</div>


            {{-- Botón --}}
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Actualizar Nota</button>
            </div>
        </div>
    </form>
</div>

{{-- Script firmas --}}
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
    let pads = {};

    function limpiarCanvas(id) {
        if (pads[id]) {
            pads[id].clear();
        }
    }

    function cargarFirmasDesdeBD() {
        ['firma_catedratico', 'firma_alumno', 'firma_paciente'].forEach(id => {
            const canvas = document.getElementById(id + '_canvas');
            const pad = new SignaturePad(canvas);
            pads[id] = pad;

            const dataURL = document.getElementById(id + '_previa').value;
            if (dataURL) {
                const img = new Image();
                img.onload = () => {
                    const ctx = canvas.getContext('2d');
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                };
                img.src = dataURL;
            }
        });
    }

    function capturarFirmas() {
        ['firma_catedratico', 'firma_alumno', 'firma_paciente'].forEach(id => {
            const input = document.getElementById(id + '_input');
            const previa = document.getElementById(id + '_previa');
            if (pads[id].isEmpty()) {
                input.value = previa.value; // Mantener firma anterior
            } else {
                input.value = pads[id].toDataURL(); // Nueva firma
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        cargarFirmasDesdeBD();
        document.querySelector('form').addEventListener('submit', capturarFirmas);
    });
</script>

@endsection
