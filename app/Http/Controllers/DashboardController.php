<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexGanadero()
    {
        return view('Ganadero.dashboard.index');
    }

    public function indexAdministrador()
    {
        return view('Administrador.dashboard.index');
    }

    public function indexGestor()
    {
        return view('Gestor.dashboard.index');
    }
}
