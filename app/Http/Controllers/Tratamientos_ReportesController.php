<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Tratamiento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Tratamientos_ReportesController extends Controller
{
    public function indexGanadero()
    {

        $usuario = Auth::user()->id_usuario;
        $reportesData = DB::select('CALL ObtenerReportesGanadero(?)', [$usuario]);
        $reportes = collect($reportesData); // Sin mapear a modelo


        $tratamientosData = DB::select('CALL ObtenerTratamientoGanadero(?)', [$usuario]);
        $tratamientos = collect($tratamientosData); // Sin mapear a modelo

       

        return view('Ganadero.tratamientosReportes.index', compact('tratamientos', 'reportes'));
    }

    public function indexAdministrador()
    {
        $usuario = Auth::user()->id_usuario;
        $tratamientosData = DB::select('CALL ObtenerTratamiento()');
        $tratamientos = collect($tratamientosData); // Sin mapear a modelo


        $reportesData = DB::select('CALL ObtenerReportes()');
        $reportes = collect($reportesData); // Sin mapear a modelo

        return view('Administrador.tratamientosReportes.index', compact('tratamientos', 'reportes'));
    }

    public function indexGestor()
    {
        $tratamientos = Tratamiento::all();
        $reportes = Reporte::all();

        return view('Gestor.tratamientosReportes.index', compact('tratamientos', 'reportes'));
    }
}
