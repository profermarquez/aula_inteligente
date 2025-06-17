<?php
namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Reserva;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
{
    // Cambia 'reserva' → 'reservas'  (o quítalo si no necesitas eager-loading)
    $horarios = Horario::with('reservas')->get();

    return view('horarios.index', compact('horarios'));
}
    public function create() {
        $reservas = Reserva::all();
        return view('horarios.create', compact('reservas'));
    }

    public function store(Request $request) {
        Horario::create($request->all());
        return redirect()->route('horarios.index')->with('success', 'Horario creado');
    }

    public function edit(Horario $horario) {
        $reservas = Reserva::all();
        return view('horarios.edit', compact('horario', 'reservas'));
    }

    public function update(Request $request, Horario $horario) {
        $horario->update($request->all());
        return redirect()->route('horarios.index')->with('success', 'Horario actualizado');
    }

    public function destroy(Horario $horario) {
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horario eliminado');
    }
}