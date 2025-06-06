@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Municipio: {{ $municipio->NombreMunicipio }}</h2>
    <p><strong>ID:</strong> {{ $municipio->ID_Municipio }}</p>
    <p><strong>Estado:</strong> {{ $municipio->estado->NombreEstado }}</p>
    <p><strong>Status:</strong> {{ $municipio->Status }}</p>
    <a href="{{ route('municipios.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
