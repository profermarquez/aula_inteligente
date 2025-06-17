@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="h3 mb-4">Editar Aula</h1>
    <form action="{{ route('aulas.update', $aula) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT')
        @include('aulas.partials.form', ['aula' => $aula])
    </form>
</div>
@endsection