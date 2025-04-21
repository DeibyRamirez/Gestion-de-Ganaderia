<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::all();
        return view('Ganadero.tratamientosReportes.index', compact('reportes'));
    }

    public function createReporte()
    {
        return view('Ganadero.tratamientosReportes.createReporte');
    }

    public function storeR(Request $request)
    {
        // Aquí puedes manejar la lógica para almacenar el tratamiento
        // Por ejemplo, guardar en la base de datos

        return redirect()->route('Ganadero.tratamientosReportes.index')->with('success', 'Tratamiento creado exitosamente.');
    }
    public function show($id)
    {
        $reporte = Reporte::findOrFail($id);
        return view('Ganadero.tratamientosReportes.showR', compact('reporte'));
    }
    public function edit($id)
    {
        $reporte = Reporte::findOrFail($id);
        return view('Ganadero.tratamientosReportes.editR', compact('reporte'));
    }
    public function update(Request $request, $id)
    {
        $reporte = Reporte::findOrFail($id);
        $reporte->update($request->all());
        return redirect()->route('Ganadero.tratamientosReportes.index')->with('success', 'Tratamiento actualizado exitosamente.');
    }
    public function destroy($id)
    {
        $reporte = Reporte::findOrFail($id);
        $reporte->delete();
        return redirect()->route('Ganadero.tratamientosReportes.index')->with('success', 'Tratamiento eliminado exitosamente.');
    }


}
