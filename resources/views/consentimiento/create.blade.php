@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 800px; margin: 0 auto; padding: 20px;">

    <div style="text-align: left; margin-bottom: 20px;">
        <a href="{{ route('consentimiento.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Regresar
        </a>
    </div>

    {{-- Encabezado --}}
    <div style="border: 2px solid #000; padding: 30px; background-color: white; border-radius: 8px;">
        <div style="display: flex; justify-content: space-between; border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px; align-items: center;">
            <div style="font-size: 14px;">
                <strong>Coordinación de la Licenciatura Cirujano Dentista</strong><br>
                <small>
                    Carta de Consentimiento Informado | NOM-004-SSA3-2012<br>
                    <span style="color: #0056b3;">Fecha de aprobación: junio 2019</span><br>
                    FO-CD-004.2
                </small>
            </div>
            <div>
                <img src="{{ asset('imagenes/logo1.png') }}" alt="Logo" style="height: 80px;">
            </div>
        </div>

        <form method="POST" action="{{ route('consentimiento.store') }}" id="consentimientoForm">
            @csrf

            {{-- Selecciones --}}
            <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 20px;">
                <div style="flex: 1 1 45%;">
                    <label><b>Alumno</b></label>
                    <select name="ID_Alumno" class="form-control" required>
                        <option value="">Selecciona un alumno</option>
                        @foreach($alumnos as $alumno)
                            <option value="{{ $alumno->Matricula }}">{{ $alumno->Nombre }} {{ $alumno->ApePaterno }} {{ $alumno->ApeMaterno }}</option>
                        @endforeach
                    </select>
                </div>
                <div style="flex: 1 1 45%;">
                    <label><b>Paciente</b></label>
                    <select name="ID_Paciente" class="form-control" required>
                        <option value="">Selecciona un paciente</option>
                        @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->ID_Paciente }}">{{ $paciente->Nombre }} {{ $paciente->ApePaterno }} {{ $paciente->ApeMaterno }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label><b>Expediente</b></label>
                <select name="ID_Expediente" class="form-control" required>
                    <option value="">Selecciona un expediente</option>
                    @foreach($expedientes as $expediente)
                        <option value="{{ $expediente->ID_Expediente }}">{{ $expediente->ID_Expediente }}</option>
                    @endforeach
                </select>
            </div>

            <div style="text-align: right; margin-bottom: 20px;">
                <label><strong>Fecha:</strong></label>
                <input type="date" name="fecha" value="{{ old('fecha', date('Y-m-d')) }}" required>
            </div>

            <h3 style="text-align:center; margin-bottom: 20px;"><b>CARTA DE CONSENTIMIENTO INFORMADO</b></h3>

            <p><b>Declaración del paciente:</b></p> <textarea name="declaracion" rows="1" class="form-control" placeholder="Declaración del paciente..." required>{{ old('declaracion') }}</textarea> <br>

            <p>Declaro que he sido informado/a satisfactoriamente de la naturaleza y propósito del procedimiento clínico bucal citado.</p>
            <p>Declaro que me han sido explicados verbalmente los posibles riesgos y complicaciones de dicho procedimiento clínico bucal, así como la existencia de otras alternativas de tratamiento. Además, he sido informado del tipo de anestesia y de los riesgos comúnmente conocidos que conlleva.</p>
            <p>El estomatólogo me ha explicado otros problemas y complicaciones poco frecuentes, derivadas del tratamiento bucal que consiste en:</p>
            <textarea name="descripcion_tratamiento" rows="2" class="form-control" required>{{ old('descripcion_tratamiento') }}</textarea>

            <p><b>Aceptación del paciente</b></p>
            <p>Acepto y me comprometo a seguir responsablemente las recomendaciones recibidas, antes y después de la intervención, así como acudir a las citas para las revisiones postoperatorias durante el tiempo indicado.</p>
            <p>Acepto y reconozco que no se me pueden dar garantías o seguridad absoluta respecto a que el resultado del procedimiento clínico-bucal sea el más satisfactorio, por lo que</p>
            <p>Acepto firmar este consentimiento informado y manifiesto que el alumno tratante:</p>
            
            <input name="alumno_tratante" class="form-control" value="{{ old('alumno_tratante') }}" readonly required>


            <p>Y los Docentes a cargo:</p>
            <textarea name="docentes" rows="2" class="form-control" required>{{ old('docentes') }}</textarea>

            <p>Me han informado del procedimiento clínico al que deseo ser sometida/o.</p>
            <p>Finalmente, atendiendo al principio de confidencialidad, acepto que el alumno tratante y personal de la salud reciba información confidencial sobre mi estado de salud.</p>

            <p><b>Firmas:</b></p>

            <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                @foreach(['paciente', 'alumno', 'docentes', 'testigo'] as $firma)
                <div style="flex: 1 1 45%; text-align: center;">
                    <label>Nombre {{ ucfirst($firma) }}</label>
                    <input type="text" name="nombre_{{ $firma }}" class="form-control" placeholder="Nombre {{ $firma }}" value="{{ old('nombre_'.$firma) }}">
                    
                    <label>Firma {{ ucfirst($firma) }}</label><br>
                    <canvas class="signature" style="border:1px solid #000; width: 100%; height: 100px;"></canvas>
                    <input type="hidden" name="firma_{{ $firma }}">
                    <button type="button" class="clear-btn btn btn-sm btn-danger mt-2">Limpiar</button>
                </div>
                @endforeach
            </div>

            <br>
            <div style="text-align: center;">
                <button type="submit" class="btn btn-primary" style="padding: 10px 30px;">Guardar</button>
            </div>

            <script>
            document.addEventListener('DOMContentLoaded', function () {
            const alumnoSelect = document.querySelector('[name="ID_Alumno"]');
            const pacienteSelect = document.querySelector('[name="ID_Paciente"]');
            const nombreAlumnoInput = document.querySelector('[name="nombre_alumno"]');
            const alumnoTratanteInput = document.querySelector('[name="alumno_tratante"');

            function actualizarNombreAlumno() {
            const selectedOption = alumnoSelect.options[alumnoSelect.selectedIndex];
            const nombreCompleto = selectedOption.text;
            nombreAlumnoInput.value = nombreCompleto;
            alumnoTratanteInput.value = nombreCompleto;
    }

            alumnoSelect.addEventListener('change', actualizarNombreAlumno);
            actualizarNombreAlumno(); // Ejecutar al cargar la página

            pacienteSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const nombre = selectedOption.text;
            document.querySelector('[name="nombre_paciente"]').value = nombre;
    });
});
</script>


        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
    const signaturePads = [];

    function resizeCanvas(canvas) {
        const ratio = window.devicePixelRatio || 1;
        const width = canvas.offsetWidth;
        const height = canvas.offsetHeight;
        canvas.width = width * ratio;
        canvas.height = height * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
    }

    document.querySelectorAll('canvas.signature').forEach((canvas, index) => {
        resizeCanvas(canvas);
        const signaturePad = new SignaturePad(canvas);
        const input = canvas.nextElementSibling;
        signaturePads.push({ signaturePad, input });

        canvas.closest('form').addEventListener('submit', () => {
            input.value = signaturePad.isEmpty() ? '' : signaturePad.toDataURL();
        });
    });

    window.addEventListener('resize', () => {
        document.querySelectorAll('canvas.signature').forEach((canvas, index) => {
            const prevData = signaturePads[index].signaturePad.toData();
            resizeCanvas(canvas);
            signaturePads[index].signaturePad.clear();
            signaturePads[index].signaturePad.fromData(prevData);
        });
    });

    document.querySelectorAll('.clear-btn').forEach((btn, index) => {
        btn.addEventListener('click', () => {
            signaturePads[index].signaturePad.clear();
            signaturePads[index].input.value = '';
        });
    });
</script>
@endsection
