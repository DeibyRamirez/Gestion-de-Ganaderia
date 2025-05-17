<?php

namespace App\Http\Controllers;

use App\Models\Ganado;
use App\Models\Publicacion;
use App\Models\PublicacionesG;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PublicacionController extends Controller
{
    public function indexGanadero()
    {
        $publicacionesG = PublicacionesG::with('ganadero')->get();
        $publicaciones = Publicacion::with('ganadero')->get();
        return view('Ganadero.publicaciones.index', compact('publicacionesG', 'publicaciones'));
    }


    public function indexAdministrador()
    {
        $publicacionesG = PublicacionesG::with('ganadero')->get();
        $publicaciones = Publicacion::with('ganadero')->get();
        return view('Administrador.publicaciones.index', compact('publicacionesG', 'publicaciones'));
    }

    public function create()
    {
        $Ganaderos = User::all();
        return view('Ganadero.publicaciones.create', compact('Ganaderos'));
    }
    public function store(Request $request)
    {
        try {
            // Proceso almacenado para insertar ganado
            DB::statement('CALL InsertarPublicaciones(?, ?, ?, ?, ?, ?, ?)', [
                $request->id_ganadero,
                $request->tipo_producto,
                $request->descripcion,
                $request->cantidad,
                $request->precio,
                $request->estado,
                $request->fecha,
            ]);
            if(Auth::user()->rol == 'ganadero'){
                return redirect()->route('Ganadero.publicaciones.index')->with('success', 'Publicación creada exitosamente.');
            }elseif(in_array(Auth::user()->rol, ['administrador', 'gestor'])){
                return redirect()->route('Administrador.publicaciones.index')->with('success', 'Publicación creada exitosamente.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al crear la Publicacion: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.publicaciones.index')->with('error', 'Error al crear la Publicacion.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['administrador', 'gestor'])) {
                return redirect()->route('Administrador.publicaciones.index')->with('error', 'Error al crear la Publicacion.')->withInput();
            }
        }
    }
    public function show($id)
    {
        $publicacionesData = DB::select('CALL ObtenerPublicacionesId(?)', [$id]);
        $publicacion = collect($publicacionesData)->first();
        return view('Ganadero.publicaciones.show', compact('publicacion'));
    }
    public function edit($id)
    {
        $Ganaderos = User::all();
        $publicacion = Publicacion::findOrFail($id);
        return view('Ganadero.publicaciones.edit', compact('publicacion', 'Ganaderos'));
    }
    public function update(Request $request, $id)
    {

        try {
            DB::statement('CALL ActualizarPublicaciones(?, ?, ?, ?, ?, ?, ?, ?)', [
                $id,
                $request->id_ganadero,
                $request->tipo_producto,
                $request->descripcion,
                $request->cantidad,
                $request->precio,
                $request->estado,
                $request->fecha,
            ]);
            if(Auth::user()->rol == 'ganadero'){
                return redirect()->route('Ganadero.publicaciones.index')->with('success', 'Publicación actualizada exitosamente.');
            }elseif(in_array(Auth::user()->rol, ['administrador', 'gestor'])){
                return redirect()->route('Administrador.publicaciones.index')->with('success', 'Publicación actualizada exitosamente.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al actualizar la Publicacion: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.publicaciones.index')->with('error', 'Error al actualizar la Publicacion.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['administrador', 'gestor'])) {
                return redirect()->route('Administrador.publicaciones.index')->with('error', 'Error al actualizar la Publicacion.')->withInput();
            }
        }
    }
    public function destroy($id)
    {
        // Proceso almacenado para eliminar ganado
        DB::statement('CALL EliminarPublicaciones(?)', [$id]);
        if(Auth::user()->rol == 'ganadero'){
            return redirect()->route('Ganadero.publicaciones.index')->with('success', 'Publicación eliminada exitosamente.');
        }elseif(in_array(Auth::user()->rol, ['administrador', 'gestor'])){
            return redirect()->route('Administrador.publicaciones.index')->with('success', 'Publicación eliminada exitosamente.');
        }
    }


    //Publicaciones de Venta Ganado..
    public function createG()
    {
        $Ganado = Ganado::all();
        $Ganaderos = User::all();
        return view('Ganadero.publicaciones.createG', compact('Ganaderos', 'Ganado'));
    }
    public function storeG(Request $request)
    {
        try {
            // Proceso almacenado para insertar ganado
            DB::statement('CALL InsertarPublicacionesG(?, ?, ?, ?, ?, ?)', [
                $request->id_vaca,
                $request->id_ganadero,
                $request->precio,
                $request->descripcion,
                $request->estado,
                $request->fecha,
            ]);
            if(Auth::user()->rol == 'ganadero'){
                return redirect()->route('Ganadero.publicaciones.index')->with('success', 'Publicación creada exitosamente.');
            }elseif(in_array(Auth::user()->rol, ['administrador', 'gestor'])){
                return redirect()->route('Administrador.publicaciones.index')->with('success', 'Publicación creada exitosamente.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al crear la Publicacion: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.publicaciones.index')->with('error', 'Error al crear la Publicacion.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['administrador', 'gestor'])) {
                return redirect()->route('Administrador.publicaciones.index')->with('error', 'Error al crear la Publicacion.')->withInput();
            }
        }
    }
    public function showG($id)
    {
        $publicacionesData = DB::select('CALL ObtenerPublicacionesGId(?)', [$id]);
        $publicacion = collect($publicacionesData)->first();
        return view('Ganadero.publicaciones.showG', compact('publicacion'));
    }
    public function editG($id)
    {
        $Ganado = Ganado::all();
        $Ganaderos = User::all();
        $publicacion = Publicacion::findOrFail($id);
        return view('Ganadero.publicaciones.editG', compact('publicacion', 'Ganaderos', 'Ganado'));
    }
    public function updateG(Request $request, $id)
    {

        try {
            DB::statement('CALL ActualizarPublicacionesG(?, ?, ?, ?, ?, ?, ?)', [
                $id,
                $request->id_vaca,
                $request->id_ganadero,
                $request->precio,
                $request->descripcion,
                $request->estado,
                $request->fecha,
            ]);
            if(Auth::user()->rol == 'ganadero'){
                return redirect()->route('Ganadero.publicaciones.index')->with('success', 'Publicación actualizada exitosamente.');
            }elseif(in_array(Auth::user()->rol, ['administrador', 'gestor'])){
                return redirect()->route('Administrador.publicaciones.index')->with('success', 'Publicación actualizada exitosamente.');
            }
        } catch (\Throwable $th) {
            Log::error('Error al actualizar la Publicacion: ' . $th->getMessage());
            if (Auth::user()->rol == 'ganadero') {
                return redirect()->route('Ganadero.publicaciones.index')->with('error', 'Error al actualizar la Publicacion.')->withInput();
            } elseif (in_array(Auth::user()->rol, ['administrador', 'gestor'])) {
                return redirect()->route('Administrador.publicaciones.index')->with('error', 'Error al actualizar la Publicacion.')->withInput();
            }
        }
    }
    public function destroyG($id)
    {
        // Proceso almacenado para eliminar ganado
        DB::statement('CALL EliminarPublicacionesG(?)', [$id]);
        if(Auth::user()->rol == 'ganadero'){
            return redirect()->route('Ganadero.publicaciones.index')->with('success', 'Publicación eliminada exitosamente.');
        }elseif(in_array(Auth::user()->rol, ['administrador', 'gestor'])){
            return redirect()->route('Administrador.publicaciones.index')->with('success', 'Publicación eliminada exitosamente.');
        }
    }
}
