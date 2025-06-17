@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="h3 mb-4">Editar Reserva</h1>
    <form action="{{ route('reservas.update', $reserva) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT')
        @include('reservas.partials.form', ['reserva' => $reserva])
    </form>
</div>
@endsection