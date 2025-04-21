<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Tratamiento;
use Illuminate\Http\Request;

class Tratamientos_ReportesController extends Controller
{
    public function indexGanadero()
    {
        $tratamientos = Tratamiento::all();
        $reportes = Reporte::all();

        return view('Ganadero.tratamientosReportes.index', compact('tratamientos', 'reportes'));
    }

    public function indexAdministrador()
    {
        $tratamientos = Tratamiento::all();
        $reportes = Reporte::all();

        return view('Administrador.tratamientosReportes.index', compact('tratamientos', 'reportes'));
    }

    public function indexGestor()
    {
        $tratamientos = Tratamiento::all();
        $reportes = Reporte::all();

        return view('Gestor.tratamientosReportes.index', compact('tratamientos', 'reportes'));
    }
}
