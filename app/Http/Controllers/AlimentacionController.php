<?php

namespace App\Http\Controllers;

use App\Models\Alimentacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AlimentacionController extends Controller
{
    public function indexGanadero()
    {
        $alimentacion = Alimentacion::all();
        return view('Ganadero.alimentacion.index', compact('alimentacion'));
    }

    public function indexAdministrador()
    {
        $alimentacion = Alimentacion::all();
        return view('Administrador.alimentacion.index', compact('alimentacion'));
    }

    public function indexGestor()
    {
        $alimentacion = Alimentacion::all();
        return view('Gestor.alimentacion.index', compact('alimentacion'));
    }

    public function create()
    {
        return view('Ganadero.alimentacion.create');
    }

    public function store(Request $request)
    {
        try {
            Alimentacion::create([
                'id_vaca' => $request->id_vaca,
                'plan_alimenticio' => $request->plan_alimenticio,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
            ]);

            return redirect()->route('Ganadero.alimentacion.index')->with('success', 'Plan de Alimentación registrado exitosamente.');
        } catch (\Throwable $th) {
            Log::error('Error al crear Plan de Alimentación : ' . $th->getMessage());
            return redirect()->route('Ganadero.alimentacion.index')->with('error', 'Error al crear Plan de Alimentación.')->withInput();
        }
    }

    public function show($id)
    {
        $alimentacion = Alimentacion::findOrFail($id);
        return view('Ganadero.alimentacion.show', compact('alimentacion'));
    }
    public function edit($id)
    {
        $alimentacion = Alimentacion::findOrFail($id);
        return view('Ganadero.alimentacion.edit', compact('alimentacion'));
    }
    public function update(Request $request, $id)
    {
        $alimentacion = Alimentacion::findOrFail($id);
        try {
            $alimentacion->update($request->all());
            return redirect()->route('Ganadero.alimentacion.index')->with('success', 'Plan de Alimentación actualizada exitosamente.');
        } catch (\Throwable $th) {
            Log::error('Error al actualizar el Plan de Alimentación: ' . $th->getMessage());
            return redirect()->route('Ganadero.alimentacion.index')->with('error', 'Error al actualizar el Plan de Alimentación.')->withInput();
        }
    }
    public function destroy($id)
    {
        $alimentacion = Alimentacion::findOrFail($id);
        try {
            $alimentacion->delete();
            return redirect()->route('Ganadero.alimentacion.index')->with('success', 'Plan de Alimentación eliminada exitosamente.');
        } catch (\Throwable $th) {
            Log::error('Error al eliminar el Plan de Alimentación: ' . $th->getMessage());
            return redirect()->route('Ganadero.alimentacion.index')->with('error', 'Error al eliminar el Plan de Alimentación.')->withInput();
        }
    }
}
