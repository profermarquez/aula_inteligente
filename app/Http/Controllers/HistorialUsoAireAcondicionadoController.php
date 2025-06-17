<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\HistorialUsoAireAcondicionado;
class HistorialUsoAireAcondicionadoController extends Controller
{
    public function index() { return HistorialUsoAireAcondicionado::with('aire')->get(); }
    public function store(Request $request) { return HistorialUsoAireAcondicionado::create($request->all()); }
    public function show(HistorialUsoAireAcondicionado $historial) { return $historial; }
    public function update(Request $request, HistorialUsoAireAcondicionado $historial) { $historial->update($request->all()); return $historial; }
    public function destroy(HistorialUsoAireAcondicionado $historial) { $historial->delete(); return response()->noContent(); }

    // Aire → Historial (GET)
    public function indexByAire(AireAcondicionado $aire) { return $aire->historialesUso; }
    // Aire → Historial (POST)
    public function storeForAire(Request $request, AireAcondicionado $aire) { return $aire->historialesUso()->create($request->all()); }
}