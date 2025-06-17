@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Muebles</h1>
    <a href="{{ route('muebles.create') }}" class="btn btn-primary mb-3">Nuevo Mueble</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Aula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($muebles as $mueble)
            <tr>
                <td>{{ $mueble->id }}</td>
                <td>{{ $mueble->tipo }}</td>
                <td>{{ $mueble->estado }}</td>
                <td>{{ $mueble->aula->nombre ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('muebles.edit', $mueble) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('muebles.destroy', $mueble) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar mueble?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection