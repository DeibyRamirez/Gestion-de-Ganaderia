<?php

namespace App\Http\Controllers;

use App\Models\HistorialMedico;
use App\Models\Tratamiento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TratamientoController extends Controller
{
    public function index()
    {
        // $usuario = Auth::user()->id_usuario;
        // $tratamientosData = DB::select('CALL ObtenerTratamientoGanadero(?)', [$usuario]);
        // $tratamientos = collect($tratamientosData); // Sin mapear a modelo
        // $Gestores = Tratamiento::with('gestor')->get();
        // return view('Ganadero.tratamientosReportes.index', compact('tratamientos', 'Gestores'));

    }

    public function createTratamiento()
    {
        $Gestores = User::all();
        $historiales = HistorialMedico::all();
        return view('Ganadero.tratamientosReportes.createTratamiento', compact('Gestores', 'historiales'));
    }

    public function store(Request $request)
    {
        try {
            // Proceso almacenado para insertar ganado
            DB::statement('CALL InsertarTratamiento(?, ?, ?, ?)', [
                $request->id_gestor,
                $request->id_historial,
                $request->descripcion,
                $request->fecha_tratamiento,
            ]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.tratamientosReportes.index')->with('success', 'Tratamiento creado con éxito.');
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.tratamientosReportes.index')->with('success', 'Tratamiento creado con éxito.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al crear la Producción: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.tratamientosReportes.index')->with('error', 'Error al crear el Tratamiento.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.tratamientosReportes.index')->with('error', 'Error al crear el Tratamiento.')->withInput();
            }
        }
    }
    public function show($id)
    {
        $tratamientosData = DB::select('CALL ObtenerTratamientoId(?)', [$id]);
        $tratamiento = collect($tratamientosData)->first();
        return view('Ganadero.tratamientosReportes.show', compact('tratamiento'));
    }
    public function edit($id)
    {
        $tratamiento = Tratamiento::findOrFail($id);
        $Gestores = User::all();
        $historiales = HistorialMedico::all();
        return view('Ganadero.tratamientosReportes.edit', compact('tratamiento', 'Gestores', 'historiales'));
    }
    public function update(Request $request, $id)
    {
        try {
            DB::statement('CALL ActualizarTratamiento(?, ?, ?, ?, ?)', [
                $id,
                $request->id_gestor,
                $request->id_historial,
                $request->descripcion,
                $request->fecha_tratamiento,
            ]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.tratamientosReportes.index')->with('success', 'Tratamiento actualizada con éxito.');
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.tratamientosReportes.index')->with('success', 'Tratamiento actualizada con éxito.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al actualizar la Producción: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.tratamientosReportes.index')->with('error', 'Error al actualizar el tratamiento.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.tratamientosReportes.index')->with('error', 'Error al actualizar el tratamiento.')->withInput();
            }
        }
    }
    public function destroy($id)
    {
        // Proceso almacenado para eliminar ganado
        DB::statement('CALL EliminarTratamiento(?)', [$id]);
        if (Auth::user()->rol == 'ganadero') {
            return redirect()->route('Ganadero.tratamientosReportes.index')->with('success', 'Tratamiento eliminado exitosamente.');
        } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
            return redirect()->route('Administrador.tratamientosReportes.index')->with('success', 'Tratamiento eliminado exitosamente.');
        }
    }
}
