<?php
namespace App\Http\Controllers;

use App\Models\Cortina;
use App\Models\Aula;
use Illuminate\Http\Request;

class CortinaController extends Controller
{
    public function index() {
        $cortinas = Cortina::with('aula')->get();
        return view('cortinas.index', compact('cortinas'));
    }

    public function create() {
        $aulas = Aula::all();
        return view('cortinas.create', compact('aulas'));
    }

    public function store(Request $request) {
        Cortina::create($request->all());
        return redirect()->route('cortinas.index')->with('success', 'Cortina creada');
    }

    public function edit(Cortina $cortina) {
        $aulas = Aula::all();
        return view('cortinas.edit', compact('cortina', 'aulas'));
    }

    public function update(Request $request, Cortina $cortina) {
        $cortina->update($request->all());
        return redirect()->route('cortinas.index')->with('success', 'Actualizado correctamente');
    }

    public function destroy(Cortina $cortina) {
        $cortina->delete();
        return redirect()->route('cortinas.index')->with('success', 'Eliminada correctamente');
    }
}
