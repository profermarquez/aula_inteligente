<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AulaController,
    DisponibilidadController,
    HorarioController,
    CortinaController,
    MateriaController,
    DocenteController,
    ReservaController,
    FocoController,
    AireAcondicionadoController,
    HistorialUsoAireAcondicionadoController,
    HistorialFocoController,
    MuebleController
};

/*
|--------------------------------------------------------------------------
| Web Routes (Blade / sesión / CSRF)
|--------------------------------------------------------------------------
| - Si necesitas endpoints JSON, créalos en routes/api.php usando
|   Route::apiResource() o Route::apiResources().
| - scopeBindings() garantiza que las claves foráneas anidadas se validen
|   entre sí (p. ej. /aulas/1/aires/4 obliga a que el aire pertenezca al aula).
*/

// Página de inicio
Route::view('/', 'welcome')->name('home');

/*--------------------------------------------------------------
| Recursos principales (CRUD completo: index, create, store…)
|--------------------------------------------------------------*/
Route::resources([
    'aulas'            => AulaController::class,
    'disponibilidades' => DisponibilidadController::class,
    'horarios'         => HorarioController::class,
    'cortinas'         => CortinaController::class,
    'materias'         => MateriaController::class,
    'docentes'         => DocenteController::class,
    'reservas'         => ReservaController::class,
    'focos'            => FocoController::class,
    'aires'            => AireAcondicionadoController::class,
    'historiales-aire' => HistorialUsoAireAcondicionadoController::class,
    'historiales-foco' => HistorialFocoController::class,
    'muebles'          => MuebleController::class,
]);

/*--------------------------------------------------------------
| Rutas anidadas y relaciones pivote
|--------------------------------------------------------------*/
Route::scopeBindings()->group(function () {

    /* Aulas → Equipamiento & horarios */
    Route::prefix('aulas/{aula}')->name('aulas.')->group(function () {
        Route::get ('aires',    [AireAcondicionadoController::class, 'indexByAula'])->name('aires.index');
        Route::post('aires',    [AireAcondicionadoController::class, 'storeInAula'])->name('aires.store');

        Route::get ('focos',    [FocoController::class, 'indexByAula'])->name('focos.index');
        Route::get ('cortinas', [CortinaController::class, 'indexByAula'])->name('cortinas.index');
        Route::get ('horarios', [HorarioController::class, 'indexByAula'])->name('horarios.index');
    });

    /* Reservas ↔ Aires (tabla pivote) */
    Route::prefix('reservas/{reserva}')->name('reservas.')->group(function () {
        Route::get   ('aires',                [ReservaController::class, 'aires'])      ->name('aires.index');
        Route::post  ('aires',                [ReservaController::class, 'attachAire']) ->name('aires.store');
        Route::delete('aires/{aire}',         [ReservaController::class, 'detachAire']) ->name('aires.destroy');
    });

    /* Aire → Historial de uso */
    Route::prefix('aires/{aire}')->name('aires.')->group(function () {
        Route::get ('historial', [HistorialUsoAireAcondicionadoController::class, 'indexByAire']) ->name('historial.index');
        Route::post('historial', [HistorialUsoAireAcondicionadoController::class, 'storeForAire']) ->name('historial.store');
    });

    /* Foco → Historial */
    Route::prefix('focos/{foco}')->name('focos.')->group(function () {
        Route::get ('historial', [HistorialFocoController::class, 'indexByFoco']) ->name('historial.index');
        Route::post('historial', [HistorialFocoController::class, 'storeForFoco']) ->name('historial.store');
    });

    /* Materia → Aulas recomendadas */
    Route::get('materias/{materia}/aulas', [MateriaController::class, 'aulasRecomendadas'])
         ->name('materias.aulas');

    /* Docente → Materias que dicta */
    Route::get('docentes/{docente}/materias', [DocenteController::class, 'materias'])
         ->name('docentes.materias');
});
