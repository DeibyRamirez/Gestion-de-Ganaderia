<?php

namespace App\Http\Controllers;

use App\Models\VentaGanado;
use Illuminate\Http\Request;
use App\Models\Venta;

class VentaGanadoController extends Controller
{
    public function index()
    
    {
        $ventas_g = VentaGanado::all();
        return view('Ganadero.ventas.index',compact('ventas_g'));
    }
    public function create()
    {
        return view('Ganadero.ventas.create');
    }
    
    public function store(Request $request)
    {
        // Aquí puedes manejar la lógica para almacenar la venta o compra
        // Por ejemplo, guardar en la base de datos

        return redirect()->route('Ganadero.ventas.index')->with('success', 'Venta de Ganado creada exitosamente.');
    }
    public function showG($id)
    {
        $venta_g = VentaGanado::findOrFail($id);
        return view('Ganadero.ventas.showG', compact('venta_g'));
    }
    public function editG($id)
    {
        $venta_g = VentaGanado::findOrFail($id);
        return view('Ganadero.ventas.editG', compact('venta_g'));
    }
    public function updateG(Request $request, $id)
    {
        $venta_g = VentaGanado::findOrFail($id);
        $venta_g->update($request->all());
        return redirect()->route('Ganadero.ventas.index')->with('success', 'Venta de Ganado actualizada exitosamente.');
    }
    public function destroyG($id)
    {
        $venta_g = VentaGanado::findOrFail($id);
        $venta_g->delete();
        return redirect()->route('Ganadero.ventas.index')->with('success', 'Venta de Ganado eliminada exitosamente.');
    }
}
