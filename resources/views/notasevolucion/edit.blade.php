@extends('layouts.app')

@section('content')
<div style="text-align: left; margin-bottom: 20px;">
    <a href="{{ route('notasevolucion.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Regresar a Notas
    </a>
</div>

<div class="container" style="max-width: 1000px;">
    <form method="POST" action="{{ route('notasevolucion.update', $nota->id) }}">
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

            {{-- Selects --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="alumno_id">Alumno</label>
                    <select name="alumno_id" class="form-control" required>
                        @foreach($alumnos as $alumno)
                            <option value="{{ $alumno->id }}" {{ $nota->alumno_id == $alumno->id ? 'selected' : '' }}>
                                {{ $alumno->ApePaterno }} {{ $alumno->ApeMaterno }} {{ $alumno->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="paciente_id">Paciente</label>
                    <select name="paciente_id" class="form-control" required>
                        @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->id }}" {{ $nota->paciente_id == $paciente->id ? 'selected' : '' }}>
                                {{ $paciente->ApePaterno }} {{ $paciente->ApeMaterno }} {{ $paciente->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="expediente_id">Expediente</label>
                    <select name="expediente_id" class="form-control" required>
                        @foreach($expedientes as $expediente)
                            <option value="{{ $expediente->ID_Expediente }}" {{ $nota->expediente_id == $expediente->ID_Expediente ? 'selected' : '' }}>
                                {{ $expediente->ID_Expediente }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="semestre_id">Semestre</label>
                    <select name="semestre_id" class="form-control" required>
                        @foreach($semestres as $semestre)
                            <option value="{{ $semestre->id }}" {{ $nota->semestre_id == $semestre->id ? 'selected' : '' }}>
                                {{ $semestre->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="grupo_id">Grupo</label>
                    <select name="grupo_id" class="form-control" required>
                        @foreach($grupos as $grupo)
                            <option value="{{ $grupo->id }}" {{ $nota->grupo_id == $grupo->id ? 'selected' : '' }}>
                                {{ $grupo->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Fecha --}}
            <div class="mb-3">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" value="{{ $nota->fecha }}" class="form-control" required>
            </div>

            {{-- Signos Vitales --}}
            <div class="row mb-3">
                <div class="col-md-2"><input type="text" name="presion_arterial" value="{{ $nota->presion_arterial }}" placeholder="Presión Arterial" class="form-control"></div>
                <div class="col-md-2"><input type="text" name="frecuencia_cardiaca" value="{{ $nota->frecuencia_cardiaca }}" placeholder="Frec. Cardíaca" class="form-control"></div>
                <div class="col-md-2"><input type="text" name="frecuencia_respiratoria" value="{{ $nota->frecuencia_respiratoria }}" placeholder="Frec. Respiratoria" class="form-control"></div>
                <div class="col-md-2"><input type="text" name="temperatura" value="{{ $nota->temperatura }}" placeholder="Temperatura" class="form-control"></div>
                <div class="col-md-2"><input type="text" name="oximetria" value="{{ $nota->oximetria }}" placeholder="Oximetría" class="form-control"></div>
            </div>

            {{-- Tratamientos --}}
            <div class="mb-3">
                <label for="tratamiento_realizado">Tratamiento Realizado</label>
                <textarea name="tratamiento_realizado" class="form-control">{{ $nota->tratamiento_realizado }}</textarea>
            </div>

            <div class="mb-3">
                <label for="descripcion_tratamiento">Descripción del Tratamiento</label>
                <textarea name="descripcion_tratamiento" class="form-control">{{ $nota->descripcion_tratamiento }}</textarea>
            </div>

            {{-- Firmas --}}
            <div class="row mb-4">
                @foreach(['catedratico', 'alumno', 'paciente'] as $firma)
                    <div class="col-md-4 text-center">
                        <label><strong>Firma {{ ucfirst($firma) }}</strong></label><br>
                        <canvas id="firma_{{ $firma }}_canvas" width="300" height="100" style="border:1px solid #000;"></canvas>
                        <input type="hidden" name="firma_{{ $firma }}" id="firma_{{ $firma }}_input" value="{{ $nota['firma_'.$firma] }}">
                        <button type="button" onclick="limpiarCanvas('firma_{{ $firma }}_canvas')" class="btn btn-sm btn-secondary mt-1">Limpiar</button>
                    </div>
                @endforeach
            </div>

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
        if (pads[id]) pads[id].clear();
    }

    function capturarFirmas() {
        ['firma_catedratico', 'firma_alumno', 'firma_paciente'].forEach(id => {
            const canvas = document.getElementById(id + '_canvas');
            const input = document.getElementById(id + '_input');
            input.value = pads[id].isEmpty() ? '' : canvas.toDataURL();
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        ['firma_catedratico', 'firma_alumno', 'firma_paciente'].forEach(id => {
            const canvas = document.getElementById(id + '_canvas');
            const pad = new SignaturePad(canvas);
            pads[id] = pad;

            const inputVal = document.getElementById(id + '_input').value;
            if (inputVal) {
                const img = new Image();
                img.onload = () => {
                    const ctx = canvas.getContext("2d");
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                };
                img.src = inputVal;
            }
        });

        document.querySelector('form').addEventListener('submit', capturarFirmas);
    });
</script>
@endsection
