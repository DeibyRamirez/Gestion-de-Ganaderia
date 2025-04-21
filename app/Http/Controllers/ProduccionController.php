<?php

namespace App\Http\Controllers;

use App\Models\Produccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProduccionController extends Controller
{
    public function indexGanadero()
    {
        $produccion = Produccion::all();
        return view('Ganadero.produccion.index', compact('produccion'));
    }

    public function indexAdministrador()
    {
        $produccion = Produccion::all();
        return view('Administrador.produccion.index', compact('produccion'));
    }

    public function indexGestor()
    {
        $produccion = Produccion::all();
        return view('Gestor.produccion.index', compact('produccion'));
    }

    public function indexDetallada()
    {
        $produccion = Produccion::all();
        return view('Ganadero.produccion.indexDetallada', compact('produccion'));
    }


    public function create()
    {
        return view('Ganadero.produccion.create');
    }

    public function store(Request $request)
    {
        try {
            Produccion::create([
                'id_vaca' => $request->id_vaca,
                'tipo' => $request->input('tipo'),
                'cantidad' => $request->input('cantidad'),
                'fecha' => $request->input('fecha'),
            ]);
            return redirect()->route('Ganadero.produccion.index')->with('success', 'Producción creada con éxito.');
        } catch (\Throwable $th) {
            Log::error('Error al crear la Producción: ' . $th->getMessage());
            return redirect()->route('Ganadero.produccion.index')->with('error', 'Error al crear la Producción.')->withInput();
        }
    }
    public function show($id)
    {
        $produccion = Produccion::findOrFail($id);
        return view('Ganadero.produccion.show', compact('produccion'));
    }
    public function edit($id)
    {
        $produccion = Produccion::findOrFail($id);
        return view('Ganadero.produccion.edit', compact('produccion'));
    }
    public function update(Request $request, $id)
    {
        $produccion = Produccion::findOrFail($id);
        try {
            $produccion->update([
                'tipo' => $request->input('tipo'),
                'cantidad' => $request->input('cantidad'),
                'fecha' => $request->input('fecha'),

            ]);
            return redirect()->route('Ganadero.produccion.index')->with('success', 'Producción actualizada con éxito.');
        } catch (\Throwable $th) {
            Log::error('Error al actualizar la Producción: ' . $th->getMessage());
            return redirect()->route('Ganadero.alimentacion.index')->with('error', 'Error al actualizar la Producción.')->withInput();
        }
    }
    public function destroy($id)
    {
        $produccion = Produccion::findOrFail($id);
        try {
            $produccion->delete();
            return redirect()->route('Ganadero.produccion.index')->with('success', 'Producción eliminada con éxito.');
        } catch (\Throwable $th) {
            Log::error('Error al eliminar la Producción: ' . $th->getMessage());
            return redirect()->route('Ganadero.alimentacion.index')->with('error', 'Error al eliminar la Producción.')->withInput();
        }
    }
}
