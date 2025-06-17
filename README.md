# Comandos php artisan make:migration

php artisan make:migration create_aulas_table
php artisan make:migration create_materias_table
php artisan make:migration create_reservas_table
php artisan make:migration create_horarios_table
php artisan make:migration create_cortinas_table
php artisan make:migration create_aires_acondicionados_table

php artisan make:migration create_muebles_table
php artisan make:migration create_proyectores_table
php artisan make:migration create_focos_table
php artisan make:migration create_muebles_table
php artisan make:migration create_proyectores_table

# Ejemplo CRUD
<?php

// Este es un ejemplo base de estructura para un CRUD completo de la entidad Aula.
// Se asume que estás usando Laravel 10+, con Blade como motor de vistas.

// =======================
// 1. Rutas web.php
// =======================

use App\Http\Controllers\AulaController;

Route::resource('aulas', AulaController::class);

// Repetir para: materias, reservas, horarios, cortinas, aires, muebles, proyectores, focos


// =======================
// 2. AulaController.php
// =======================
<?php
namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function index() {
        $aulas = Aula::all();
        return view('aulas.index', compact('aulas'));
    }

    public function create() {
        return view('aulas.create');
    }

    public function store(Request $request) {
        Aula::create($request->all());
        return redirect()->route('aulas.index')->with('success', 'Aula creada exitosamente');
    }

    public function show(Aula $aula) {
        return view('aulas.show', compact('aula'));
    }

    public function edit(Aula $aula) {
        return view('aulas.edit', compact('aula'));
    }

    public function update(Request $request, Aula $aula) {
        $aula->update($request->all());
        return redirect()->route('aulas.index')->with('success', 'Aula actualizada');
    }

    public function destroy(Aula $aula) {
        $aula->delete();
        return redirect()->route('aulas.index')->with('success', 'Aula eliminada');
    }
}


// =======================
// 3. Ejemplo vista aulas/index.blade.php
// =======================

<!-- resources/views/aulas/index.blade.php -->
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Aulas</h1>
    <a href="{{ route('aulas.create') }}" class="btn btn-primary mb-3">Nueva Aula</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Capacidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aulas as $aula)
            <tr>
                <td>{{ $aula->id }}</td>
                <td>{{ $aula->nombre }}</td>
                <td>{{ $aula->ubicacion }}</td>
                <td>{{ $aula->capacidad }}</td>
                <td>
                    <a href="{{ route('aulas.edit', $aula) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('aulas.destroy', $aula) }}" method="POST" style="display:inline-block">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Eliminar aula?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


// =======================
// 4. Similar estructura para create/edit/show.blade.php
// =======================
// Usar Bootstrap forms + validaciones, con campos correspondientes al modelo Aula
// Y replicar esta estructura para las otras entidades.

// =======================
// 5. Relaciones en vistas
// =======================
// Por ejemplo, al crear una Reserva, podés incluir un select:
// <select name="aula_id"> @foreach($aulas as $aula) <option value="{{ $aula->id }}">{{ $aula->nombre }}</option> @endforeach </select>

// ¡Recordá pasar las relaciones en el controlador (ej: Aula::all())

// Si querés, puedo seguir generando los otros CRUDs con el mismo esquema.




# problemas tablas
DELETE FROM migrations WHERE id = 15;
DROP TABLE tabla;
php artisan migrate:fresh



# Para volver a crear la base de datos en blanco en windows desde el directorio raiz del proyecto
powershell New-Item -Path .\database\database.sqlite -ItemType File -Force



# Verificar rutas
php artisan route:list --name=aulas
