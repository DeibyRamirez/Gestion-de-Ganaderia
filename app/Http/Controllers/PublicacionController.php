<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;


class PublicacionController extends Controller
{
    public function indexGanadero()
    {
        $publicaciones = Publicacion::all();
        return view('Ganadero.publicaciones.index', compact('publicaciones'));
        
    }

    public function indexAdministrador()
    {
        $publicaciones = Publicacion::all();
        return view('Administrador.publicaciones.index', compact('publicaciones'));
        
    }
    public function create()
    {
        
        return view('Ganadero.publicaciones.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'tipo_producto' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required|numeric',
            'precio' => 'required|numeric',
        ]);

        Publicacion::create([
            'id_ganadero' => auth()->user()->id_usuario,
            'tipo_producto' => $request->tipo_producto,
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
            'estado' => 'disponible',
        ]);

        return redirect()->route('publicaciones.index')->with('success', 'Publicación creada exitosamente.');
    }
    public function show($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        return view('Ganadero.publicaciones.show', compact('publicacion'));
    }
    public function edit($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        return view('Ganadero.publicaciones.edit', compact('publicacion'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo_producto' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required|numeric',
            'precio' => 'required|numeric',
        ]);

        $publicacion = Publicacion::findOrFail($id);
        $publicacion->update([
            'tipo_producto' => $request->tipo_producto,
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
        ]);

        return redirect()->route('publicaciones.index')->with('success', 'Publicación actualizada exitosamente.');
    }
    public function destroy($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        $publicacion->delete();

        return redirect()->route('publicaciones.index')->with('success', 'Publicación eliminada exitosamente.');
    }


}
