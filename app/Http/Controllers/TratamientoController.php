<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    public function index()
    {
        $tratamientos = Tratamiento::all();
        return view('Ganadero.tratamientosReportes.index', compact('tratamientos'));
    }

    public function createTratamiento()
    {
        return view('Ganadero.tratamientosReportes.createTratamiento');
    }

    public function store(Request $request)
    {
        // Aquí puedes manejar la lógica para almacenar el tratamiento
        // Por ejemplo, guardar en la base de datos

        return redirect()->route('Ganadero.tratamientosReportes.index')->with('success', 'Tratamiento creado exitosamente.');
    }
    public function show($id)
    {
        $tratamiento = Tratamiento::findOrFail($id);
        return view('Ganadero.tratamientosReportes.show', compact('tratamiento'));
    }
    public function edit($id)
    {
        $tratamiento = Tratamiento::findOrFail($id);
        return view('Ganadero.tratamientosReportes.edit', compact('tratamiento'));
    }
    public function update(Request $request, $id)
    {
        $tratamiento = Tratamiento::findOrFail($id);
        $tratamiento->update($request->all());
        return redirect()->route('Ganadero.tratamientosReportes.index')->with('success', 'Tratamiento actualizado exitosamente.');
    }
    public function destroy($id)
    {
        $tratamiento = Tratamiento::findOrFail($id);
        $tratamiento->delete();
        return redirect()->route('Ganadero.tratamientosReportes.index')->with('success', 'Tratamiento eliminado exitosamente.');
    }
}
