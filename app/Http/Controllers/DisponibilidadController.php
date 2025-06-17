<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Disponibilidad;
class DisponibilidadController extends Controller
{
    public function index() { return Disponibilidad::all(); }
    public function store(Request $request) { return Disponibilidad::create($request->all()); }
    public function show(Disponibilidad $disponibilidad) { return $disponibilidad; }
    public function update(Request $request, Disponibilidad $disponibilidad) { $disponibilidad->update($request->all()); return $disponibilidad; }
    public function destroy(Disponibilidad $disponibilidad) { $disponibilidad->delete(); return response()->noContent(); }
}