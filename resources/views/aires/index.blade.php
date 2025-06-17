@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Aires Acondicionados</h1>
    <a href="{{ route('aires.create') }}" class="btn btn-primary mb-3">Nuevo Aire</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Temperatura</th>
                <th>Momento del día</th>
                <th>Aula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aires as $aire)
            <tr>
                <td>{{ $aire->temperatura_objetivo }}</td>
                <td>{{ $aire->momento_dia }}</td>
                <td>{{ $aire->aula->nombre ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('aires.edit', $aire) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('aires.destroy', $aire) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
