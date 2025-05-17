<?php

namespace App\Http\Controllers;

use App\Models\Ganado;
use App\Models\HistorialMedico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HistorialMedicoController extends Controller
{
    public function indexGanadero()
    {
        $hitorialData = DB::select('CALL ObtenerHistorialMedico()');
        $historial_medico = collect($hitorialData); // Sin mapear a modelo
        $vacas = Ganado::all();
        return view('Ganadero.historial.index', compact('historial_medico', 'vacas'));
    }

    public function indexAdministrador()
    {
        $hitorialData = DB::select('CALL ObtenerHistorialMedico()');
        $historial_medico = collect($hitorialData); // Sin mapear a modelo
        $vacas = Ganado::all();

        return view('Administrador.historial.index', compact('historial_medico', 'vacas'));
    }

    public function indexGestor()
    {
        $hitorialData = DB::select('CALL ObtenerHistorialMedico()');
        $historial_medico = collect($hitorialData); // Sin mapear a modelo
        $vacas = Ganado::all();

        return view('Gestor.historial.index', compact('historial_medico', 'vacas'));
    }

    public function create()
    {
        $vacas = Ganado::all();
        return view('Ganadero.historial.create', compact('vacas'));
    }

    public function store(Request $request)
    {
        try {
            // Proceso almacenado para insertar ganado
            DB::statement('CALL InsertarHistorialMedico(?, ?, ?, ?)', [
                $request->id_vaca,
                $request->sintomas,
                $request->diagnostico,
                $request->fecha_diagnostico,
            ]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.historial.index')->with('success', 'Historial médico creado con éxito.');
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.historial.index')->with('success', 'Historial médico creado con éxito.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al crear el Historial médico: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.historial.index')->with('error', 'Error al crear el Historial médico.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.historial.index')->with('error', 'Error al crear el Historial médico.')->withInput();
            }
        }
    }
    public function show($id)
    {
        $historialData = DB::select('CALL ObtenerHistorialMedicoId(?)', [$id]);
        $historial_medico = collect($historialData)->first(); // Sin mapear a modelo
        $vaca = Ganado::findOrFail($id);
        return view('Ganadero.historial.show', compact('historial_medico', 'vaca'));
    }
    public function edit($id)
    {
        $historialData = DB::select('CALL ObtenerHistorialMedicoId(?)', [$id]);
        $historial_medico = collect($historialData)->first(); // Sin mapear a modelo
        $vacas = Ganado::all();
        return view('Ganadero.historial.edit', compact('historial_medico', 'vacas'));
    }
    public function update(Request $request, $id)
    {
        try {

            DB::statement('CALL ActualizarHistorialMedico(?, ?, ?, ?, ?)', [
                $id,
                $request->id_vaca,
                $request->sintomas,
                $request->diagnostico,
                $request->fecha_diagnostico,
            ]);

            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.historial.index')->with('success', 'Historial médico actualizado con éxito.');
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.historial.index')->with('success', 'Historial médico actualizado con éxito.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al actualizar el Historial médico: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.historial.index')->with('error', 'Error al actualizar el Historial médico.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.historial.index')->with('error', 'Error al actualizar el Historial médico.')->withInput();
            }
        }
    }
    public function destroy($id)
    {
        try {
            // Proceso almacenado para eliminar ganado
            DB::statement('CALL EliminarHistorialMedico(?)', [$id]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.historial.index')->with('success', 'Historial médico eliminado con éxito.');
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.historial.index')->with('success', 'Historial médico eliminado con éxito.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al eliminar el Historial médico: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.historial.index')->with('error', 'Error al eliminar el Historial médico.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.historial.index')->with('error', 'Error al eliminar el Historial médico.')->withInput();
            }
        }
    }
}
