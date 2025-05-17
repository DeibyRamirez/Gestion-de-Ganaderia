<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UsuarioController extends Controller
{
    public function index()
    {
        $UsuarioData = DB::select('CALL ObtenerUsuarios()');
        $usuarios = collect($UsuarioData);
        return view('Administrador.usuario.index', compact('usuarios'));
    }

    public function create()
    {
        $usuarios = User::all();
        return view('Administrador.usuario.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        try {
            // Proceso almacenado para insertar ganado
            DB::statement('CALL InsertarUsuarios(?, ?, ?, ?, ?, ?, ?)', [
                $request->name,
                $request->last_name,
                $request->email,
                $request->password,
                $request->telefono,
                $request->direccion,
                $request->rol,
            ]);
            
                return redirect()->route('Administrador.usurio.index')->with('success', 'Usuario creado con éxito.');
            
        } catch (\Throwable $th) {
            Log::error('Error al crear la Producción: ' . $th->getMessage());
            {
                return redirect()->route('Administrador.usuario.index')->with('error', 'Error al crear el Usuario.')->withInput();
            }
        }

    }

    

    public function edit($id)
    {   $usuario = User::findOrFail($id);
        return view('Administrador.usuario.edit', compact('id', 'usuario'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Proceso almacenado para insertar ganado
            DB::statement('CALL ActualizarUsuarios(?, ?, ?, ?, ?, ?, ?, ?)', [
                $id,
                $request->name,
                $request->last_name,
                $request->email,
                $request->password,
                $request->telefono,
                $request->direccion,
                $request->rol,
            ]);
            
                return redirect()->route('Administrador.usuario.index')->with('success', 'Usuario creado con éxito.');
            
        } catch (\Throwable $th) {
            Log::error('Error al crear la Producción: ' . $th->getMessage());
            {
                return redirect()->route('Administrador.usuario.index')->with('error', 'Error al crear el Usuario.')->withInput();
            }
        }
    }

    public function destroy($id)
    {
        try {
            DB::statement('CALL EliminarUsuarios(?)', [$id]);
        } catch (\Throwable $th) {
            Log::error('Error al eliminar el Usuario: ' . $th->getMessage());
            return redirect()->route('Administrador.usuario.index')->with('error', 'Error al eliminar el Usuario.');
        }

    }
}
