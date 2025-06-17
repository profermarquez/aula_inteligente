<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\HistorialFoco;
class HistorialFocoController extends Controller
{
    public function index() { return HistorialFoco::with('foco')->get(); }
    public function store(Request $request) { return HistorialFoco::create($request->all()); }
    public function show(HistorialFoco $historial) { return $historial; }
    public function update(Request $request, HistorialFoco $historial) { $historial->update($request->all()); return $historial; }
    public function destroy(HistorialFoco $historial) { $historial->delete(); return response()->noContent(); }

    // Foco → Historial (GET)
    public function indexByFoco(Foco $foco) { return $foco->historiales; }
    // Foco → Historial (POST)
    public function storeForFoco(Request $request, Foco $foco) { return $foco->historiales()->create($request->all()); }
}