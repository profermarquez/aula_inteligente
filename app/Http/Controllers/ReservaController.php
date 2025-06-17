<?php
namespace App\Http\Controllers;
use App\Models\Reserva;
use App\Models\Aula;
use Illuminate\Http\Request; 
use App\Models\Materia;
use App\Models\Horario;

class ReservaController extends Controller
{
    public function index() {
        $reservas = Reserva::with(['aula', 'materia'])->get();
        return view('reservas.index', compact('reservas'));
    }

    public function create() {
        $aulas = Aula::all();
        $materias = Materia::all();
        $horarios  = Horario::all();    
        return view('reservas.create', compact('aulas', 'materias'));
    }

    public function store(Request $request) {
        Reserva::create($request->all());
        return redirect()->route('reservas.index')->with('success', 'Reserva creada');
    }

    public function show(Reserva $reserva) {
        return view('reservas.show', compact('reserva'));
    }

    public function edit(Reserva $reserva) {
        $aulas = Aula::all();
        $materias = Materia::all();
         $horarios = Horario::all();      
        return view('reservas.edit', compact('reserva', 'aulas', 'materias'));
    }

    public function update(Request $request, Reserva $reserva) {
        $reserva->update($request->all());
        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada');
    }

    public function destroy(Reserva $reserva) {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada');
    }
}
