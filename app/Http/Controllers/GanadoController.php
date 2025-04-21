<?php

namespace App\Http\Controllers;

use App\Models\Ganado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GanadoController extends Controller
{
    public function indexGanadero()
    {
        $ganado = Ganado::all();
        return view('Ganadero.ganado.index', compact('ganado'));
    }

    public function indexAdministrador()
    {
        $ganado = Ganado::all();
        return view('Administrador.ganado.index', compact('ganado'));
    }

    public function indexGestor()
    {
        $ganado = Ganado::all();
        return view('Gestor.ganado.index', compact('ganado'));
    }

    public function create()
    {
        return view('Ganadero.ganado.create');
    }

    public function store(Request $request)
    {
        try {
            Ganado::create([
                'id_ganadero'=> Auth::id(),
                'nombre' => $request->nombre,
                'raza' => $request->raza,
                'edad' => $request->edad,
                'tipo' => $request->tipo,
                'fecha_nacimiento' => $request->fecha_nacimiento,
            ]);
            return redirect()->route('Ganadero.ganado.index')->with('success', 'Ganado creado exitosamente.');
        } catch (\Throwable $th) {
            Log::error('Error al crear ganado: ' . $th->getMessage());
            return redirect()->route('Ganadero.ganado.index')->with('error', 'Error al crear ganado.')->withInput();
        }

    }

    public function show($id)
    {
        $vaca = Ganado:: with('user')-> findOrFail($id);
        return view('Ganadero.ganado.show', compact('vaca'));
    }
    public function edit($id)
    {
        $vaca = Ganado::findOrFail($id);
        return view('Ganadero.ganado.edit', compact('vaca'));
    }
    public function update(Request $request, $id)
    {
        $vaca = Ganado::findOrFail($id);
        try {
            $vaca->update([
                'nombre' => $request->nombre,
                'raza' => $request->raza,
                'edad' => $request->edad,
                'tipo' => $request->tipo,
                'fecha_nacimiento' => $request->fecha_nacimiento,
            ]);
            return redirect()->route('Ganadero.ganado.index')->with('success', 'Ganado actualizado exitosamente.');

        }catch (\Throwable $th) {
            Log::error('Error al actualizar el ganado: ' . $th->getMessage());
            return redirect()->route('Ganadero.ganado.index')->with('error', 'Error al actualizar el  ganado.')->withInput();
        }
       
        
    }
    public function destroy($id)
    {
        $vaca = Ganado::findOrFail($id);
        try{
            $vaca->delete();
        return redirect()->route('Ganadero.ganado.index')->with('success', 'Ganado eliminado exitosamente.');
        }
        catch (\Throwable $th) {
            Log::error('Error al eliminar el ganado: ' . $th->getMessage());
            return redirect()->route('Ganadero.ganado.index')->with('error', 'Error al eliminar el  ganado.')->withInput();
        }
        
    }
}
