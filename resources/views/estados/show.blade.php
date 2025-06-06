@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Estado: {{ $estado->NombreEstado }}</h2>
    <p><strong>ID:</strong> {{ $estado->ID_Estado }}</p>
    <p><strong>Status:</strong> {{ $estado->Status }}</p>
    <a href="{{ route('estados.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
