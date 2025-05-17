<?php

namespace App\Http\Controllers;

use App\Models\Ganado;
use App\Models\User;
use App\Models\VentaGanado;
use Illuminate\Http\Request;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VentaGanadoController extends Controller
{
    public function index()

    {
        $ventas_g = VentaGanado::all();
        return view('Ganadero.ventas.index', compact('ventas_g'));
    }
    public function create()
    {
        $Ganaderos = User::all();
        $Ganado = Ganado::all();
        return view('Ganadero.ventas.create', compact('Ganaderos', 'Ganado'));
    }


    public function showG($id)
    {
        $venta_gData = DB::select('CALL ObtenerVentasGanadoId(?)', [$id]);
        $venta_g = collect($venta_gData)->first(); // Sin mapear a modelo
        // Asegúrate de que exista la venta antes de buscar el comprador
        $comprador = null;
        if ($venta_g && isset($venta_g->id_comprador)) {
            $comprador = User::find($venta_g->id_comprador);
        }
        $Ganado = null;
        if ($venta_g && isset($venta_g->id_vaca)) {
            $Ganado = Ganado::find($venta_g->id_vaca);
        }
        return view('Ganadero.ventas.showG', compact('venta_g', 'comprador', 'Ganado'));
    }
    public function editG($id)
    {
        $venta_g = VentaGanado::findOrFail($id);
        $Ganaderos = User::all();
        $Ganado = Ganado::all();
        return view('Ganadero.ventas.editG', compact('venta_g', 'Ganaderos', 'Ganado'));
    }
    public function updateG(Request $request, $id)
    {
        try {
            DB::statement('CALL ActualizarVentasGanado(?, ?, ?, ?, ?, ?)', [
                $id,
                $request->id_vaca,
                $request->id_vendedor,
                $request->id_comprador,
                $request->precio,
                $request->fecha_venta,
            ]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.ventas.indexDetallada')->with('success', 'Venta de Ganado actualizada exitosamente.');
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.ventas.index')->with('success', 'Venta de Ganado actualizada exitosamente.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al actualizar la Venta: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.ventas.indexDetallada')->with('error', 'Error al actualizar la Venta de Ganado.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.ventas.index')->with('error', 'Error al actualizar la Venta de Ganado.')->withInput();
            }
        }
    }
    public function destroyG($id)
    {
        // Proceso almacenado para eliminar ganado
        DB::statement('CALL EliminarVentasGanado(?)', [$id]);
        if (Auth::user()->rol == 'ganadero') {
            return redirect()->route('Ganadero.ventas.indexDetallada')->with('success', 'Venta de Ganado eliminada exitosamente.');
        } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
            return redirect()->route('Administrador.ventas.index')->with('success', 'Venta de Ganado eliminada exitosamente.');
        }
    }
}
