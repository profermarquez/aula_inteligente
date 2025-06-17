<?php
namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Docente;  
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index() {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
    }

    public function create() {
         $docentes = Docente::all();   
        return view('materias.create');
    }

    public function store(Request $request) {
        Materia::create($request->all());
        return redirect()->route('materias.index')->with('success', 'Materia creada');
    }

    public function show(Materia $materia) {
        return view('materias.show', compact('materia'));
    }

    public function edit(Materia $materia) {
        $docentes = Docente::all();    
        return view('materias.edit', compact('materia'));
    }

    public function update(Request $request, Materia $materia) {
        $materia->update($request->all());
        return redirect()->route('materias.index')->with('success', 'Materia actualizada');
    }

    public function destroy(Materia $materia) {
        $materia->delete();
        return redirect()->route('materias.index')->with('success', 'Materia eliminada');
    }
}
