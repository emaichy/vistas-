@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Notas de Evolución</h2>
    <a href="{{ route('notasevolucion.create') }}" class="btn btn-primary mb-3">+ Nueva Nota</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Alumno</th>
                <th>Paciente</th>
                <th>Fecha</th>
                <th>PDF</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notas as $nota)
                <tr>
                    <td>{{ $nota->id }}</td>
                    <td>{{ $nota->alumno->Nombre }} {{ $nota->alumno->ApePaterno }} {{ $nota->alumno->ApeMaterno }}</td>
                    <td>{{ $nota->paciente->Nombre }} {{ $nota->paciente->ApePaterno }} {{ $nota->paciente->ApeMaterno }}</td>
                    <td>{{ $nota->fecha }}</td>
                    <td>
                        @if($nota->pdf_document)
                            <a href="{{ Storage::url($nota->pdf_document) }}" target="_blank">Ver PDF</a>
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('notasevolucion.show', $nota->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('notasevolucion.edit', $nota->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('notasevolucion.destroy', $nota->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta nota?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
