@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="h3 mb-4">Editar Cortina</h1>
    <form action="{{ route('cortinas.update', $cortina) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT')
        @include('cortinas.partials.form', ['cortina' => $cortina])
    </form>
</div>
@endsection