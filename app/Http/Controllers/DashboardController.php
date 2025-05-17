<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function indexGanadero()

    {
        // Obtener el ID del usuario autenticado
        $idUsuario = Auth::user()->id_usuario;

        // Llamar al procedimiento T_Ganado con el ID del ganadero
        $GanadoTotalData = DB::select('CALL T_Ganado(?)', [$idUsuario]);
        $GanadoTotal = $GanadoTotalData[0]->total_ganado ?? 0;

        // Llamar Produccion_Leche con variable de salida
        DB::statement('CALL Produccion_Leche(?, @total_leche)', [$idUsuario]);
        $leche = DB::select('SELECT @total_leche AS total_leche')[0]->total_leche ?? 0;

        // Llamar Produccion_Leche con variable de salida
        DB::statement('CALL Produccion_Carne(?, @total_carne)', [$idUsuario]);
        $carne = DB::select('SELECT @total_carne AS total_carne')[0]->total_carne ?? 0;

        // Llamar Total_ingresos con variable de salida
        DB::statement('CALL Total_ingresos(?, @total_ingresos)', [$idUsuario]);
        $ingresos = DB::select('SELECT @total_ingresos AS total_ingresos')[0]->total_ingresos ?? 0;

        // Retornar la vista con los datos
        return view('Ganadero.dashboard.index', compact('GanadoTotal', 'leche', 'ingresos', 'carne'));
    }

    public function indexAdministrador()
{
    $ganado = DB::select('CALL Total_ganado()')[0]->total_ganado ?? 0;
    $ganaderos = DB::select('CALL Total_Ganaderos()')[0]->total_ganaderos ?? 0;
    $admins = DB::select('CALL Total_Administradores()')[0]->total_admins ?? 0;
    $gestores = DB::select('CALL Total_Gestores()')[0]->total_gestores ?? 0;
    $leche = DB::select('CALL Total_Leche()')[0]->total_leche ?? 0;
    $carne = DB::select('CALL Total_Carne()')[0]->total_carne ?? 0;

    return view('Administrador.dashboard.index', compact('ganado', 'ganaderos', 'admins', 'gestores', 'leche', 'carne'));
}


    public function indexGestor()
    {
        return view('Gestor.dashboard.index');
    }
}
