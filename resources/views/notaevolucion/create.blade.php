@extends('layouts.app')

@section('content')
<div style="text-align: left; margin-bottom: 20px;">
    <a href="{{ route('notasevolucion.index') }}" style="text-decoration: none; background-color: #6c757d; color: white; padding: 6px 12px; border-radius: 4px; display: inline-flex; align-items: center;">
        <i class="fas fa-arrow-left" style="margin-right: 6px;"></i> Regresar a Notas
    </a>
</div>

<div style="display: flex; justify-content: center; padding: 30px; background-color: #f5f5f5;">
    <div style="
        max-width: 900px;
        width: 100%;
        border: 2px solid #000;
        padding: 40px;
        background-color: white;
        font-family: Arial, sans-serif;
        font-size: 14px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        color: #000;
    ">
        {{-- Encabezado membretado --}}
        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px;">
            <div style="font-size: 14px; line-height: 1.2;">
                <strong>Coordinación de la Licenciatura Cirujano Dentista</strong><br>
                <small>
                    Notas de evolución | Conforme a la <strong>NOM-004-SSA3-2012</strong> y a la <strong>NOM-013-SSA2-2015</strong><br>
                    <span style="color: #0056b3;">Fecha de aprobación por la Coordinación junio 2019</span><br>
                    FO-CD-011
                </small>
            </div>
            <div>
                <img src="{{ asset('imagenes/logo1.png') }}" alt="Logo" style="height: 100px;">
            </div>
        </div>

        <h3 style="text-align: center; font-weight: bold; margin-bottom: 30px;">NOTAS DE EVOLUCIÓN</h3>

        <form method="POST" action="{{ route('notasevolucion.store') }}">
            @csrf

            {{-- Datos Alumno y Paciente --}}
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                <tr>
                    <td style="border: 1px solid #000; padding: 8px; vertical-align: top; width: 75%;">
                        <strong>Nombre del Alumno</strong><br>
                        <div style="display: flex; gap: 8px; margin-top: 4px;">
                            <input name="alumno_apellido_paterno" placeholder="Apellido Paterno" style="flex:1; padding: 6px; border: 1px solid #999;">
                            <input name="alumno_apellido_materno" placeholder="Apellido Materno" style="flex:1; padding: 6px; border: 1px solid #999;">
                            <input name="alumno_nombre" placeholder="Nombre(s)" style="flex:1; padding: 6px; border: 1px solid #999;">
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 8px; vertical-align: top; width: 25%;">
                        <strong>Semestre y grupo</strong><br>
                        <input name="semestre_grupo" style="width: 100%; padding: 6px; border: 1px solid #999;">
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000; padding: 8px; vertical-align: top;">
                        <strong>Nombre del Paciente</strong><br>
                        <div style="display: flex; gap: 8px; margin-top: 4px;">
                            <input name="paciente_apellido_paterno" placeholder="Apellido Paterno" style="flex:1; padding: 6px; border: 1px solid #999;">
                            <input name="paciente_apellido_materno" placeholder="Apellido Materno" style="flex:1; padding: 6px; border: 1px solid #999;">
                            <input name="paciente_nombre" placeholder="Nombre(s)" style="flex:1; padding: 6px; border: 1px solid #999;">
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 8px; vertical-align: top;">
                        <strong>No. de expediente</strong><br>
                        <input name="expediente" style="width: 100%; padding: 6px; border: 1px solid #999;">
                    </td>
                </tr>
            </table>

            {{-- Fecha --}}
            <div style="margin-bottom: 20px;">
                <label><strong>Fecha:</strong></label><br>
                <input type="date" name="fecha" value="{{ old('fecha', date('Y-m-d')) }}" style="padding: 6px; width: 150px; border: 1px solid #999;">
            </div>

            {{-- Signos Vitales --}}
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px; text-align: center;">
                <thead>
                    <tr style="background-color: #ddd; font-weight: bold;">
                        <th style="border: 1px solid #000; padding: 8px;">Presión Arterial</th>
                        <th style="border: 1px solid #000; padding: 8px;">Frecuencia Cardíaca</th>
                        <th style="border: 1px solid #000; padding: 8px;">Frecuencia Respiratoria</th>
                        <th style="border: 1px solid #000; padding: 8px;">Temperatura</th>
                        <th style="border: 1px solid #000; padding: 8px;">Oximetría</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #000; padding: 6px;">
                            <input type="text" name="presion_arterial" placeholder="Presión Arterial" style="width: 100%; padding: 6px; border: 1px solid #999;">
                        </td>
                        <td style="border: 1px solid #000; padding: 6px;">
                            <input type="text" name="frecuencia_cardiaca" placeholder="Frecuencia Cardíaca" style="width: 100%; padding: 6px; border: 1px solid #999;">
                        </td>
                        <td style="border: 1px solid #000; padding: 6px;">
                            <input type="text" name="frecuencia_respiratoria" placeholder="Frecuencia Respiratoria" style="width: 100%; padding: 6px; border: 1px solid #999;">
                        </td>
                        <td style="border: 1px solid #000; padding: 6px;">
                            <input type="text" name="temperatura" placeholder="Temperatura" style="width: 100%; padding: 6px; border: 1px solid #999;">
                        </td>
                        <td style="border: 1px solid #000; padding: 6px;">
                            <input type="text" name="oximetria" placeholder="Oximetría" style="width: 100%; padding: 6px; border: 1px solid #999;">
                        </td>
                    </tr>
                </tbody>
            </table>

            {{-- Tratamiento Realizado --}}
            <div style="margin-bottom: 20px;">
                <label><strong>Tratamiento Realizado</strong></label><br>
                <textarea name="tratamiento_realizado" rows="2" style="width: 100%; padding: 8px; border: 1px solid #999;"></textarea>
            </div>

            {{-- Descripción del Tratamiento --}}
            <div style="margin-bottom: 20px;">
                <label><strong>Descripción del Tratamiento</strong></label><br>
                <textarea name="descripcion_tratamiento" rows="10" style="width: 100%; padding: 8px; border: 1px solid #999;"></textarea>
            </div>

            {{-- Firmas --}}
            <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 30px;">
                @foreach(['catedratico', 'alumno', 'paciente'] as $firma)
                <div style="flex: 1 1 30%; text-align: center;">
                    <label><strong>Firma {{ ucfirst($firma) }}</strong></label><br>
                    <canvas id="firma_{{ $firma }}_canvas" width="300" height="100" style="border:1px solid #000; display: block; margin: 10px auto;"></canvas>
                    <input type="hidden" name="firma_{{ $firma }}" id="firma_{{ $firma }}_input">
                    <button type="button" style="padding: 5px 10px; background-color: #6c757d; color: white; border: none; border-radius: 3px;" onclick="limpiarCanvas('firma_{{ $firma }}_canvas')">Limpiar</button>
                </div>
                @endforeach
            </div>

            <div style="text-align: center; margin-top: 40px;">
                <button type="submit" style="padding: 10px 30px; background-color: #004080; color: white; border: none; border-radius: 5px; cursor: pointer;">Guardar Nota</button>
            </div>
        </form>
    </div>
</div>

{{-- Script para firmas con SignaturePad --}}
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
    let pads = {};

    function limpiarCanvas(id) {
        if (pads[id]) {
            pads[id].clear();
        }
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
            pads[id] = new SignaturePad(canvas);
        });

        // Capturar firmas antes de enviar el formulario
        document.querySelector('form').addEventListener('submit', (e) => {
            capturarFirmas();
        });
    });
</script>
@endsection
