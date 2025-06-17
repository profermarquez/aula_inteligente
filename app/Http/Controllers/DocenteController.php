<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /* ====================== Vistas CRUD ====================== */

    public function index()
    {
        $docentes = Docente::all();
        return view('docentes.index', compact('docentes'));
    }

    public function create()
    {
        return view('docentes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'dni'          => 'required|string|max:20|unique:docentes,dni',
            'nombre'       => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
        ]);

        Docente::create($data);

        return redirect()
            ->route('docentes.index')
            ->with('success', 'Docente creado exitosamente.');
    }

    public function edit(Docente $docente)
    {
        return view('docentes.edit', compact('docente'));
    }

    public function update(Request $request, Docente $docente)
    {
        $data = $request->validate([
            'dni'          => 'required|string|max:20|unique:docentes,dni,' . $docente->id,
            'nombre'       => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
        ]);

        $docente->update($data);

        return redirect()
            ->route('docentes.index')
            ->with('success', 'Docente actualizado.');
    }

    public function destroy(Docente $docente)
    {
        $docente->delete();

        return redirect()
            ->route('docentes.index')
            ->with('success', 'Docente eliminado.');
    }

    /* ====================== Relación extra ====================== */

    /** Devuelve las materias que dicta el docente (JSON). */
    public function materias(Docente $docente)
    {
        return $docente->load('materias')->materias;
    }
}
