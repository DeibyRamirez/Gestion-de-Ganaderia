<?php

namespace App\Http\Controllers;

use App\Models\Ganado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GanadoController extends Controller
{
    public function indexGanadero()
    {
        $usuario = Auth::user()->id_usuario;
        // LLamo a los datos de ganado en el proceso almacenado
        $ganadoData = DB::select('CALL ObtenerGanadoGanadero(?)',[$usuario]);

        // Utilizo collect para convertir el resultado en una colección y motrarlo en la vista
        $ganado = collect($ganadoData); // Sin mapear a modelo
        return view('Ganadero.ganado.index', compact('ganado'));
    }

    public function indexAdministrador()
    {
        $ganadoData = DB::select('CALL ObtenerGanado()');

        $ganado = collect($ganadoData); // Sin mapear a modelo
        return view('Administrador.ganado.index', compact('ganado'));
    }

    public function create()
    {
        return view('Ganadero.ganado.create');
    }

    public function store(Request $request)
    {
        try {

            // Proceso almacenado para insertar ganado
            DB::statement('CALL InsertarGanado(?, ?, ?, ?, ?, ?)', [
                Auth::user()->id_usuario,
                $request->nombre,
                $request->raza,
                $request->edad,
                $request->tipo,
                $request->fecha_nacimiento
            ]);
            if(Auth::user()->rol == 'ganadero'){
                return redirect()->route('Ganadero.ganado.index')->with('success', 'Ganado registrado exitosamente.');
            }elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.ganado.index')->with('success', 'Ganado registrado exitosamente.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al registrar el ganado: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.ganado.index')->with('error', 'Error al registrar el ganado.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.ganado.index')->with('error', 'Error al registrar el ganado.')->withInput();
            }
        }
    }

    public function show($id)
    {
        //Proceso almacenado para obtener el ganado por id
        $vacaData = DB::select('CALL ObtenerGanadoId(?)', [$id]);

        $vaca = collect($vacaData)->first(); // Sin mapear a modelo

        return view('Ganadero.ganado.show', compact('vaca'));
    }

    public function edit($id)
    {
        // Fomulario de edición
        $vaca = Ganado::findOrFail($id);
        return view('Ganadero.ganado.edit', compact('vaca'));
    }
    public function update(Request $request, $id)
    {
        // Proceso almacenado para actualizar ganado
        try {
            DB::statement('CALL ActualizarGanado(?, ?, ?, ?, ?, ?, ?)', [
                $id,
                Auth::user()->id_usuario,
                $request->nombre,
                $request->raza,
                $request->edad,
                $request->tipo,
                $request->fecha_nacimiento
            ]);
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.ganado.index')->with('success', 'Ganado actualizado exitosamente.');
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.ganado.index')->with('success', 'Ganado actualizado exitosamente.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al actualizar el ganado: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.ganado.index')->with('error', 'Error al actualizar el ganado.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
                return redirect()->route('Administrador.ganado.index')->with('error', 'Error al actualizar el ganado.')->withInput();
            }
        }
    }
    public function destroy($id)
    {
        // Proceso almacenado para eliminar ganado
        DB::statement('CALL EliminarGanado(?)', [$id]);
        if (Auth::user()->rol == 'ganadero') {
            return redirect()->route('Ganadero.ganado.index')->with('success', 'Ganado eliminado exitosamente.');
        } elseif (in_array(Auth::user()->rol, ['gestor', 'administrador'])) {
            return redirect()->route('Administrador.ganado.index')->with('success', 'Ganado eliminado exitosamente.');
        }

    }
}
