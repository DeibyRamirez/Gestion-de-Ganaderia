<?php

namespace App\Http\Controllers;

use App\Models\Ganado;
use App\Models\Produccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProduccionController extends Controller
{
   public function indexGanadero()
{
    $id = Auth::user()->id_usuario;
    $produccionData = DB::select('CALL ObtenerProduccionMensualPorGanadero(?)', [$id]);
    $produccion = collect($produccionData);

    // Prepare data for the chart
    $chartData = [
        'meses' => $produccion->pluck('mes')->map(function($mes) {
            return \Carbon\Carbon::createFromFormat('Y-m', $mes)->format('M Y');
        })->toArray(),
        'leche' => $produccion->pluck('total_leche')->toArray(),
        'carne' => $produccion->pluck('total_carne')->toArray()
    ];

    return view('Ganadero.produccion.index', [
        'produccion' => $produccion,
        'chartData' => $chartData
    ]);
}
    public function indexAdministrador()
    {
        $produccionData = DB::select('CALL ObtenerProduccion()');
        $produccion = collect($produccionData); // Sin mapear a modelo
        $vacas = Ganado::all();
        return view('Administrador.produccion.index', compact('produccion', 'vacas'));
    }

    public function indexGestor()
    {
        $produccionData = DB::select('CALL ObtenerProduccion()');
        $produccion = collect($produccionData); // Sin mapear a modelo
        $vacas = Ganado::all();
        return view('Gestor.produccion.index', compact('produccion', 'vacas'));
    }

    public function indexDetallada()
    {
        $usuario = Auth::user()->id_usuario;
        $produccionData = DB::select('CALL ObtenerProduccionGanadero(?)', [$usuario]);
        $produccion = collect($produccionData); // Sin mapear a modelo
        $vacas = Ganado::all();
        return view('Ganadero.produccion.indexDetallada', compact('produccion', 'vacas'));
    }


    public function create()
    {
        $vacas = Ganado::all();
        return view('Ganadero.produccion.create', compact('vacas'));
    }

    public function store(Request $request)
    {
        try {
            // Proceso almacenado para insertar ganado
            DB::statement('CALL InsertarProduccion(?, ?, ?, ?)', [
                $request->id_vaca,
                $request->tipo_produccion,
                $request->cantidad,
                $request->fecha,
            ]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.produccion.indexDetallada')->with('success', 'Producción creada con éxito.');
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.produccion.index')->with('success', 'Producción creada con éxito.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al crear la Producción: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.produccion.indexDetallada')->with('error', 'Error al crear la Producción.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.produccion.index')->with('error', 'Error al crear la Producción.')->withInput();
            }
        }
    }
    public function show($id)
    {
        $produccionData = DB::select('CALL ObtenerProduccionId(?)', [$id]);
        $produccion = collect($produccionData)->first(); // Sin mapear a modelo
        $vaca = Ganado::findOrFail($id);

        return view('Ganadero.produccion.show', compact('produccion', 'vaca'));
    }
    public function edit($id)
    {
        $produccion = Produccion::findOrFail($id);
        $vacas = Ganado::all();
        return view('Ganadero.produccion.edit', compact('produccion', 'vacas'));
    }
    public function update(Request $request, $id)
    {

        try {
            DB::statement('CALL ActualizarProduccion(?, ?, ?, ?, ?)', [
                $id,
                $request->id_vaca,
                $request->tipo_produccion,
                $request->cantidad,
                $request->fecha,
            ]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.produccion.indexDetallada')->with('success', 'Producción actualizada con éxito.');
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.produccion.index')->with('success', 'Producción actualizada con éxito.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al actualizar la Producción: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.produccion.indexDetallada')->with('error', 'Error al actualizar la Producción.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.produccion.index')->with('error', 'Error al actualizar la Producción.')->withInput();
            }
        }
    }
    public function destroy($id)
    {

        try {
            // Proceso almacenado para eliminar ganado
            DB::statement('CALL EliminarProduccion(?)', [$id]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.produccion.indexDetallada')->with('success', 'Producción eliminada con éxito.');
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.produccion.index')->with('success', 'Producción eliminada con éxito.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al eliminar la Producción: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.produccion.indexDetallada')->with('error', 'Error al eliminar la Producción.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.produccion.index')->with('error', 'Error al eliminar la Producción.')->withInput();
            }
        }
    }
}
