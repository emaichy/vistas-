@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Lista de Semestres</h2>
    <a href="{{ route('semestres.create') }}" class="btn btn-primary mb-3">Nuevo Semestre</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Semestre</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($semestres as $semestre)
            <tr>
                <td>{{ $semestre->ID_Semestre }}</td>
                <td>{{ $semestre->Semestre }}</td>
                <td>{{ $semestre->Status }}</td>
                <td>
                    <a href="{{ route('semestres.show', $semestre->ID_Semestre) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('semestres.edit', $semestre->ID_Semestre) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('semestres.destroy', $semestre->ID_Semestre) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este semestre?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
