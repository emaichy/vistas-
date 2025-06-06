@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalle del Semestre</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $semestre->ID_Semestre }}</li>
        <li class="list-group-item"><strong>Semestre:</strong> {{ $semestre->Semestre }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $semestre->Status }}</li>
    </ul>

    <a href="{{ route('semestres.index') }}" class="btn btn-primary mt-3">Regresar</a>
</div>
@endsection
