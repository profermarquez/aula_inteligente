<?php
namespace App\Http\Controllers;

use App\Models\AireAcondicionado;
use App\Models\Aula;
use Illuminate\Http\Request;

class AireAcondicionadoController extends Controller
{
    public function index() {
        $aires = AireAcondicionado::with('aula')->get();
        return view('aires.index', compact('aires'));
    }

    public function create() {
        $aulas = Aula::all();
        return view('aires.create', compact('aulas'));
    }

    public function store(Request $request) {
        AireAcondicionado::create($request->all());
        return redirect()->route('aires.index')->with('success', 'Aire acondicionado creado');
    }

    public function edit(AireAcondicionado $aire) {
        $aulas = Aula::all();
        return view('aires.edit', compact('aire', 'aulas'));
    }

    public function update(Request $request, AireAcondicionado $aire) {
        $aire->update($request->all());
        return redirect()->route('aires.index')->with('success', 'Actualizado correctamente');
    }

    public function destroy(AireAcondicionado $aire) {
        $aire->delete();
        return redirect()->route('aires.index')->with('success', 'Eliminado correctamente');
    }

     // Aula → Aires (GET)
    public function indexByAula(Aula $aula) { return $aula->aires; }
    // Aula → Aires (POST)
    public function storeInAula(Request $request, Aula $aula) { return $aula->aires()->create($request->all()); }

}