<?php

namespace App\Http\Controllers;

use App\Models\Ganado;
use App\Models\User;
use App\Models\Venta;
use App\Models\VentaGanado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VentaController extends Controller
{
    public function indexGanadero()
    {
        $ventasData = DB::select('CALL ObtenerVentas()');
        $ventas = collect($ventasData); // Sin mapear a modelo
        return view('Ganadero.ventas.index',compact('ventas'));
    }

    public function indexAdministrador()
    {
        $ventasData = DB::select('CALL ObtenerVentas()');
        $ventas = collect($ventasData); // Sin mapear a modelo
        $ventasGanadoData = DB::select('CALL ObtenerVentasGanado()');
        $ventas_ganado = collect($ventasGanadoData); // Sin mapear a modelo
        $Ganaderos = User::all();
        return view('Administrador.ventas.index',compact('ventas', 'ventas_ganado', 'Ganaderos'));
    }

    public function indexGestor()
    {
        $ventasData = DB::select('CALL ObtenerVentas()');
        $ventas = collect($ventasData); // Sin mapear a modelo
        $ventasGanadoData = DB::select('CALL ObtenerVentasGanado()');
        $ventas_ganado = collect($ventasGanadoData); // Sin mapear a modelo
        return view('Gestor.ventas.index',compact('ventas', 'ventas_ganado'));
    }

    public function indexDetallada()
    {
        $ventasData = DB::select('CALL ObtenerVentas()');
        $ventas = collect($ventasData); // Sin mapear a modelo
        $ventasGanadoData = DB::select('CALL ObtenerVentasGanado()');
        $ventas_ganado = collect($ventasGanadoData); // Sin mapear a modelo
        $Ganaderos = User::all();
        $Ganado = Ganado::all();
        return view('Ganadero.ventas.indexDetallada',compact('ventas', 'ventas_ganado', 'Ganaderos', 'Ganado'));
    }

    
    public function createProduccion()
    {
        $Ganaderos = User::all();
        return view('Ganadero.ventas.createProduccion', compact('Ganaderos'));
    }

    
    public function store(Request $request)
    {
       try {
            // Proceso almacenado para insertar ganado
            DB::statement('CALL InsertarVentas(?, ?, ?, ?, ?, ?)', [
                $request->id_vendedor,
                $request->id_comprador,
                $request->producto,
                $request->cantidad,
                $request->precio,
                $request->fecha_venta,
            ]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.ventas.indexDetallada')->with('success', 'Venta creada con éxito.');
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.ventas.index')->with('success', 'Venta creada con éxito.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al crear la Producción: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.ventas.indexDetallada')->with('error', 'Error al crear la Venta.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.ventas.index')->with('error', 'Error al crear la Venta.')->withInput();
            }
        }

       
    }
    public function storeG(Request $request)
    {
       try {
            // Proceso almacenado para insertar ganado
            DB::statement('CALL InsertarVentasGanado(?, ?, ?, ?, ?)', [
                $request->id_vendedor,
                $request->id_comprador,
                $request->id_vaca,
                $request->precio,
                $request->fecha_venta,
            ]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.ventas.indexDetallada')->with('success', 'Venta de Ganado creada con éxito.');
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.ventas.index')->with('success', 'Venta de Ganado creada con éxito.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al crear la Producción: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.ventas.indexDetallada')->with('error', 'Error al crear la Venta de Ganado.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.ventas.index')->with('error', 'Error al crear la Venta de Ganado.')->withInput();
            }
        }

       
    }
   
    public function show($id)
{
    $ventaData = DB::select('CALL ObtenerVentasId(?)', [$id]);
    $venta = collect($ventaData)->first(); // Sin mapear a modelo

    // Asegúrate de que exista la venta antes de buscar el comprador
    $comprador = null;
    if ($venta && isset($venta->id_comprador)) {
        $comprador = User::find($venta->id_comprador);
    }

    return view('Ganadero.ventas.show', compact('venta', 'comprador'));
}

    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        $Ganaderos = User::all();
        return view('Ganadero.ventas.edit', compact('venta', 'Ganaderos'));
    }
    public function update(Request $request, $id)
    {

        try {
            DB::statement('CALL ActualizarVentas(?, ?, ?, ?, ?, ?, ?)', [
                $id,
                $request->id_vendedor,
                $request->id_comprador,
                $request->producto,
                $request->precio,
                $request->cantidad,
                $request->fecha_venta,
            ]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.ventas.indexDetallada')->with('success', 'Venta actualizada con éxito.');
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.ventas.index')->with('success', 'Venta actualizada con éxito.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al actualizar la Producción: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.ventas.indexDetallada')->with('error', 'Error al actualizar la Venta.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.ventas.index')->with('error', 'Error al actualizar la Venta.')->withInput();
            }
        }
    }
    public function destroy($id)
    {
        // Proceso almacenado para eliminar ganado
        DB::statement('CALL EliminarVentas(?)', [$id]);
        if (Auth::user()->rol == 'ganadero') {
            return redirect()->route('Ganadero.ventas.indexDetallada')->with('success', 'Venta eliminada exitosamente.');
        } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
            return redirect()->route('Administrador.ventas.index')->with('success', 'Venta eliminada exitosamente.');
        }
    }
}

