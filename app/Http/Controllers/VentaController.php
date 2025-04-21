<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\VentaGanado;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function indexGanadero()
    {
        $ventas = Venta::all();
        return view('Ganadero.ventas.index',compact('ventas'));
    }

    public function indexAdministrador()
    {
        $ventas = Venta::all();
        $ventas_ganado = VentaGanado::all();
        return view('Administrador.ventas.index',compact('ventas', 'ventas_ganado'));
    }

    public function indexGestor()
    {
        $ventas = Venta::all();
        $ventas_ganado = VentaGanado::all();
        return view('Gestor.ventas.index',compact('ventas', 'ventas_ganado'));
    }

    public function indexDetallada()
    {
        $ventas = Venta::all();
        $ventas_ganado = VentaGanado::all();
        return view('Ganadero.ventas.indexDetallada',compact('ventas', 'ventas_ganado'));
    }

    
    public function createProduccion()
    {
        return view('Ganadero.ventas.createProduccion');
    }

    
    public function store(Request $request)
    {
        // Aquí puedes manejar la lógica para almacenar la venta o compra
        // Por ejemplo, guardar en la base de datos

        return redirect()->route('Ganadero.ventas.index')->with('success', 'Venta creada exitosamente.');
    }
   
    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        return view('Ganadero.ventas.show', compact('venta'));
    }
    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        return view('Ganadero.ventas.edit', compact('venta'));
    }
    public function update(Request $request, $id)
    {
        $venta = Venta::findOrFail($id);
        $venta->update($request->all());
        return redirect()->route('Ganadero.ventas.index')->with('success', 'Venta de Ganado actualizada exitosamente.');
    }
    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();
        return redirect()->route('Ganadero.ventas.index')->with('success', 'Venta de Ganado eliminada exitosamente.');
    }
}

