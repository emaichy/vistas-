@csrf
<div class="mb-3">
    <label>Nombre del Anexo</label>
    <input type="text" name="Nombre_Anexo" class="form-control" value="{{ old('Nombre_Anexo', $anexo->Nombre_Anexo ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Tipo</label>
    <input type="text" name="Tipo_Anexo" class="form-control" value="{{ old('Tipo_Anexo', $anexo->Tipo_Anexo ?? '') }}">
</div>
<div class="mb-3">
    <label>Expediente</label>
    <select name="ID_Expediente" class="form-control" required>
        @foreach($expedientes as $exp)
            <option value="{{ $exp->ID_Expediente }}" {{ (old('ID_Expediente', $anexo->ID_Expediente ?? '') == $exp->ID_Expediente) ? 'selected' : '' }}>
                Expediente #{{ $exp->ID_Expediente }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Archivo</label>
    <input type="file" name="Ruta_Anexo" class="form-control">
    @if(isset($anexo) && $anexo->Ruta_Anexo)
        <p>Actual: <a href="{{ Storage::url($anexo->Ruta_Anexo) }}" target="_blank">Ver Archivo</a></p>
    @endif
</div>
