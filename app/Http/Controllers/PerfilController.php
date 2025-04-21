<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function perfil(){
        $datos_perfil = Usuario::all();
        return view('inicioRegistro.perfil', compact('datos_perfil'));
    }
}
