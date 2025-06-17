<?php

namespace App\Http\Controllers;

use App\Models\Mueble;
use App\Models\Aula;
use Illuminate\Http\Request;

class MuebleController extends Controller
{
    public function index() {
        $muebles = Mueble::with('aula')->get();
        return view('muebles.index', compact('muebles'));
    }

    public function create() {
        $aulas = Aula::all();
        return view('muebles.create', compact('aulas'));
    }

    public function store(Request $request) {
        Mueble::create($request->all());
        return redirect()->route('muebles.index')->with('success', 'Mueble creado');
    }

    public function edit(Mueble $mueble) {
        $aulas = Aula::all();
        return view('muebles.edit', compact('mueble', 'aulas'));
    }

    public function update(Request $request, Mueble $mueble) {
        $mueble->update($request->all());
        return redirect()->route('muebles.index')->with('success', 'Mueble actualizado');
    }

    public function destroy(Mueble $mueble) {
        $mueble->delete();
        return redirect()->route('muebles.index')->with('success', 'Mueble eliminado');
    }
}