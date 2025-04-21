<?php

namespace App\Http\Controllers;

use App\Models\HistorialMedico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HistorialMedicoController extends Controller
{
    public function indexGanadero()
    {
        $historial_medico = HistorialMedico::all();
        return view('Ganadero.historial.index', compact('historial_medico'));
    }

    public function indexAdministrador()
    {
        $historial_medico = HistorialMedico::all();
        return view('Administrador.historial.index', compact('historial_medico'));
    }

    public function indexGestor()
    {
        $historial_medico = HistorialMedico::all();
        return view('Gestor.historial.index', compact('historial_medico'));
    }

    public function create()
    {
        return view('Ganadero.historial.create');
    }

    public function store(Request $request)
    {
        try {
            HistorialMedico::create([
                'id_vaca' => $request->id_vaca,
                'sintomas' => $request->sintomas,
                'diagnostico' => $request->diagnostico,
                'fecha_diagnostico' => $request->fecha_diagnostico,
            ]);
            return redirect()->route('Ganadero.historial.index')->with('success', 'Historial médico creado con éxito.');
        } catch (\Throwable $th) {
            Log::error('Error al crear el Historial médico: ' . $th->getMessage());
            return redirect()->route('Ganadero.historial.index')->with('error', 'Error al crear el Historial médico.')->withInput();
        }

        
    }
    public function show($id)
    {
        $historial_medico = HistorialMedico::findOrFail($id);
        return view('Ganadero.historial.show', compact('historial_medico'));
    }
    public function edit($id)
    {
        $historial_medico = HistorialMedico::findOrFail($id);
        return view('Ganadero.historial.edit', compact('historial_medico'));
    }
    public function update(Request $request, $id)
    {
        $historial_medico = HistorialMedico::findOrFail($id);
        try {
            $historial_medico->update([
                
                'sintomas' => $request->sintomas,
                'diagnostico' => $request->diagnostico,
                'fecha_diagnostico' => $request->fecha_diagnostico,
            ]);
            
            return redirect()->route('Ganadero.historial.index')->with('success', 'Historial médico actualizado con éxito.');
        } catch (\Throwable $th) {
            Log::error('Error al actualizar el Historial médico: ' . $th->getMessage());
            return redirect()->route('Ganadero.historial.index')->with('error', 'Error al actualizar el Historial médico.')->withInput();
        }
        
    }
    public function destroy($id)
    {
        $historial_medico = HistorialMedico::findOrFail($id);
        
        try {
            $historial_medico->delete();
            return redirect()->route('Ganadero.historial.index')->with('success', 'Historial médico eliminado con éxito.');
        } catch (\Throwable $th) {
            Log::error('Error al eliminar el Historial médico: ' . $th->getMessage());
            return redirect()->route('Ganadero.historial.index')->with('error', 'Error al eliminar el Historial médico.')->withInput();
        }
    }
}
