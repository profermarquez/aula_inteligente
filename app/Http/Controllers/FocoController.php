<?php
namespace App\Http\Controllers;

use App\Models\Foco;
use App\Models\Aula;
use Illuminate\Http\Request;

class FocoController extends Controller
{
    public function index() {
        $focos = Foco::with('aula')->get();
        return view('focos.index', compact('focos'));
    }

    public function create() {
        $aulas = Aula::all();
        return view('focos.create', compact('aulas'));
    }

    public function store(Request $request) {
        Foco::create($request->all());
        return redirect()->route('focos.index')->with('success', 'Foco creado');
    }

    public function edit(Foco $foco) {
        $aulas = Aula::all();
        return view('focos.edit', compact('foco', 'aulas'));
    }

    public function update(Request $request, Foco $foco) {
        $foco->update($request->all());
        return redirect()->route('focos.index')->with('success', 'Actualizado correctamente');
    }

    public function destroy(Foco $foco) {
        $foco->delete();
        return redirect()->route('focos.index')->with('success', 'Eliminado correctamente');
    }
}