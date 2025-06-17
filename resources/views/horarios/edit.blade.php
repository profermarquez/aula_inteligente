@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="h3 mb-4">Editar Horario</h1>
    <form action="{{ route('horarios.update', $horario) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT')
        @include('horarios.partials.form', ['horario' => $horario])
    </form>
</div>
@endsection