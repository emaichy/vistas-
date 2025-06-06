@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ isset($maestro) ? 'Editar' : 'Crear' }} Maestro</h2>
    <form action="{{ isset($maestro) ? route('maestros.update', $maestro->ID_Maestro) : route('maestros.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($maestro)) @method('PUT') @endif
        @include('maestros.form')
        <div class="text-end mt-3">
            <button class="btn btn-success">Guardar</button>
            <a href="{{ route('maestros.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
