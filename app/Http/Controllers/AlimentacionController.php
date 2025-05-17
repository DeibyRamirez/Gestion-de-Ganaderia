<?php

namespace App\Http\Controllers;

use App\Models\Alimentacion;
use App\Models\Ganado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AlimentacionController extends Controller
{
    public function indexGanadero()
    {
        // LLamo a los datos de ganado en el proceso almacenado
        $alimentacionData = DB::select('CALL ObtenerAlimento()');


        $alimentacion = collect($alimentacionData); // Sin mapear a modelo
        $vacas = Ganado::all();

        return view('Ganadero.alimentacion.index', compact('alimentacion', 'vacas'));
    }

    public function indexAdministrador()
    {
        // LLamo a los datos de ganado en el proceso almacenado
        $alimentacionData = DB::select('CALL ObtenerAlimento()');
        $vacas = Ganado::all();
        $alimentacion = collect($alimentacionData); // Sin mapear a modelo
        return view('Administrador.alimentacion.index', compact('alimentacion', 'vacas'));
    }

    public function indexGestor()
    {
        // LLamo a los datos de ganado en el proceso almacenado
        $alimentacionData = DB::select('CALL ObtenerAlimento()');
        $vacas = Ganado::all();
        $alimentacion = collect($alimentacionData); // Sin mapear a modelo
        return view('Gestor.alimentacion.index', compact('alimentacion', 'vacas'));
    }

    public function create()
    {
        $vacas = Ganado::all();

        return view('Ganadero.alimentacion.create', compact('vacas',));
    }

    public function store(Request $request)
    {
        try {
            // Proceso almacenado para insertar ganado
            DB::statement('CALL InsertarAlimento(?, ?, ?, ?)', [
                $request->id_vaca,
                $request->plan_alimenticio,
                $request->fecha_inicio,
                $request->fecha_fin,
            ]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.alimentacion.index')->with('success', 'Plan de Alimentación registrado exitosamente.');
            } elseif (in_array(Auth::user()->rol, ['Gestor', 'administrador'])) {
                return redirect()->route('Administrador.alimentacion.index')->with('success', 'Plan de Alimentación registrado exitosamente.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al crear Plan de Alimentación : ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.alimentacion.index')->with('error', 'Error al crear Plan de Alimentación.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['Gestor', 'administrador'])) {
                return redirect()->route('Administrador.alimentacion.index')->with('error', 'Error al crear Plan de Alimentación.')->withInput();
            }
        }
    }

    public function show($id)
    {
        //Proceso almacenado para obtener el ganado por id
        $planData = DB::select('CALL ObtenerAlimentoId(?)', [$id]);

        $alimentacion = collect($planData)->first(); // Sin mapear a modelo
        $vaca = Ganado::findOrFail($id);
        return view('Ganadero.alimentacion.show', compact('alimentacion', 'vaca'));
    }
    public function edit($id)
    {
        $alimentacion = Alimentacion::findOrFail($id);
        $vacas = Ganado::all();
        return view('Ganadero.alimentacion.edit', compact('alimentacion', 'vacas'));
    }
    public function update(Request $request, $id)
    {

        try {
            DB::statement('CALL ActualizarAlimento(?, ?, ?, ?, ?)', [
                $id,
                $request->id_vaca,
                $request->plan_alimenticio,
                $request->fecha_inicio,
                $request->fecha_fin,
            ]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.alimentacion.index')->with('success', 'Plan de Alimentación actualizada exitosamente.');
            } elseif (in_array(Auth::user()->rol, ['Gestor', 'administrador'])) {
                return redirect()->route('Administrador.alimentacion.index')->with('success', 'Plan de Alimentación actualizada exitosamente.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al actualizar el Plan de Alimentación: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.alimentacion.index')->with('error', 'Error al actualizar el Plan de Alimentación.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['Gestor', 'administrador'])) {
                return redirect()->route('Administrador.alimentacion.index')->with('error', 'Error al actualizar el Plan de Alimentación.')->withInput();
            }
        }
    }
    public function destroy($id)
    {

        try {
            // Proceso almacenado para eliminar ganado
            DB::statement('CALL EliminarAlimento(?)', [$id]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.alimentacion.index')->with('success', 'Plan de Alimentación eliminada exitosamente.');
            } elseif (in_array(Auth::user()->rol, ['Gestor', 'administrador'])) {
                return redirect()->route('Administrador.alimentacion.index')->with('success', 'Plan de Alimentación eliminada exitosamente.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al eliminar el Plan de Alimentación: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.alimentacion.index')->with('error', 'Error al eliminar el Plan de Alimentación.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['Gestor', 'administrador'])) {
                return redirect()->route('Administrador.alimentacion.index')->with('error', 'Error al eliminar el Plan de Alimentación.')->withInput();
            }
        }
    }
}
