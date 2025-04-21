<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function crearUsuario()
    {
        return view('inicioRegistro.registro');
    }
}
