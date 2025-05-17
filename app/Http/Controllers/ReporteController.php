<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReporteController extends Controller
{
    public function index()
    {
        $reportesData = DB::select('CALL ObtenerReportes()');
        $reportes = collect($reportesData); // Sin mapear a modelo
        $Gestores = Reporte::with('gestor')->get(); // si también usas gestor en reportes

        return view('Ganadero.tratamientosReportes.index', compact('reportes'));
    }

    public function createR()
    {
        $Gestores = User::all();
        return view('Ganadero.tratamientosReportes.createReporte', compact('Gestores'));
    }

    public function storeR(Request $request)
    {
        try {
            // Proceso almacenado para insertar ganado
            DB::statement('CALL InsertarReportes(?, ?, ?)', [
                $request->id_gestor,
                $request->descripcion,
                $request->fecha_reporte,
            ]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.tratamientosReportes.index')->with('success', 'Reporte creado con éxito.');
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.tratamientosReportes.index')->with('success', 'Reporte creado con éxito.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al crear la Producción: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.tratamientosReportes.index')->with('error', 'Error al crear el Reporte.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.tratamientosReportes.index')->with('error', 'Error al crear el Reporte.')->withInput();
            }
        }
    }
    public function showR($id)
    {
        $reportesData = DB::select('CALL ObtenerReportesId(?)', [$id]);
        $reporte = collect($reportesData)->first();
        return view('Ganadero.tratamientosReportes.showR', compact('reporte'));
    }
    public function editR($id)
    {
        $Gestores = User::all();
        $reporte = Reporte::findOrFail($id);
        return view('Ganadero.tratamientosReportes.editR', compact('reporte', 'Gestores'));
    }
    public function updateR(Request $request, $id)
    {
        try {
            DB::statement('CALL ActualizarReportes(?, ?, ?, ?)', [
                $id,
                $request->id_gestor,
                $request->descripcion,
                $request->fecha_reporte,
            ]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.tratamientosReportes.index')->with('success', 'Reporte actualizada con éxito.');
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.tratamientosReportes.index')->with('success', 'Reporte actualizada con éxito.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al actualizar la Producción: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.tratamientosReportes.index')->with('error', 'Error al actualizar el Reporte.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.tratamientosReportes.index')->with('error', 'Error al actualizar el Reporte.')->withInput();
            }
        }
    }
    public function destroyR($id)
    {
        DB::select('CALL EliminarReportes(?)', [$id]);
        if (Auth::user()->rol == 'ganadero') {
            return redirect()->route('Ganadero.tratamientosReportes.index')->with('success', 'Reporte eliminado exitosamente.');
        } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
            return redirect()->route('Administrador.tratamientosReportes.index')->with('success', 'Reporte eliminado exitosamente.');
        }
    }
}
