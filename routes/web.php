<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Auth.login');
});

Route::get('/dashboard', function () {
    return view('info');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



use App\Http\Controllers\GanadoController;
use App\Http\Controllers\AlimentacionController;
use App\Http\Controllers\HistorialMedicoController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\VentaGanadoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\VentaGeneralController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\Tratamientos_ReportesController;


// RUTAS ADMINISTRACIÓN DEL GANADO
Route::get('/ganadoGanadero',[GanadoController::class,'indexGanadero'])->name('Ganadero.ganado.index');
Route::get('/ganadoAdministrador',[GanadoController::class,'indexAdministrador'])->name('Administrador.ganado.index');
Route::get('/ganadoGestor',[GanadoController::class,'indexGestor'])->name('Gestor.ganado.index');
Route::get('/ganado/nuevo',[GanadoController::class,'create'])->name('Ganadero.ganado.create');
Route::post('/ganado', action: [GanadoController::class, 'store'])->name('Ganadero.ganado.store');
Route::get('/ganado/{id}', action: [GanadoController::class, 'show'])->name('Ganadero.ganado.show');
Route::get('/ganado/{id}/edit', action: [GanadoController::class, 'edit'])->name('Ganadero.ganado.edit');
Route::put('/ganado/{id}/update', action: [GanadoController::class, 'update'])->name('Ganadero.ganado.update');
Route::delete('/ganado/{id}/delete', [GanadoController::class, 'destroy'])->name('Ganadero.ganado.destroy');
//Route::post('/ganado',[GanadoController::class,'store'])->name('ganado.store');



// RUTAS PLAN DE ALIMENTACION
Route::get('/alimentacionGanadero',[AlimentacionController::class,'indexGanadero'])->name('Ganadero.alimentacion.index');
Route::get('/alimentacionAdministrador',[AlimentacionController::class,'indexAdministrador'])->name('Administrador.alimentacion.index');
Route::get('/alimentacionGestor',[AlimentacionController::class,'indexGestor'])->name('Gestor.alimentacion.index');
Route::get('/alimentacion/crear',[AlimentacionController::class,'create'])->name('Ganadero.alimentacion.create');
Route::post('/alimentacion', action: [AlimentacionController::class, 'store'])->name('Ganadero.alimentacion.store');
Route::get('/alimentacion/{id}', action: [AlimentacionController::class, 'show'])->name('Ganadero.alimentacion.show');
Route::get('/alimentacion/{id}/edit', action: [AlimentacionController::class, 'edit'])->name('Ganadero.alimentacion.edit');
Route::put('/alimentacion/{id}/update', action: [AlimentacionController::class, 'update'])->name('Ganadero.alimentacion.update');
Route::delete('/alimentacion/{id}/delete', [AlimentacionController::class, 'destroy'])->name('Ganadero.alimentacion.destroy');
//Route::post('/alimentacion',[AlimentacionController::class,'store'])->name('alimentacion.store');



// RUTAS HISTORIAL MEDICO
Route::get('/historial-medicoGanadero', [HistorialMedicoController::class, 'indexGanadero'])->name('Ganadero.historial.index');
Route::get('/historial-medicoAdministrador', [HistorialMedicoController::class, 'indexAdministrador'])->name('Administrador.historial.index');
Route::get('/historial-medicoGestor', [HistorialMedicoController::class, 'indexGestor'])->name('Gestor.historial.index');
Route::get('/historial-medico/crear', [HistorialMedicoController::class, 'create'])->name('Ganadero.historial.create');
Route::post('/historial-medico', action: [HistorialMedicoController::class, 'store'])->name('Ganadero.historial.store');
Route::get('/historial-medico/{id}', action: [HistorialMedicoController::class, 'show'])->name('Ganadero.historial.show');
Route::get('/historial-medico/{id}/edit', action: [HistorialMedicoController::class, 'edit'])->name('Ganadero.historial.edit');
Route::put('/historial-medico/{id}/update', action: [HistorialMedicoController::class, 'update'])->name('Ganadero.historial.update');
Route::delete('/historial-medico/{id}/delete', [HistorialMedicoController::class, 'destroy'])->name('Ganadero.historial.destroy');
//Route::post('/historial-medico', [HistorialMedicoController::class, 'store'])->name('historial.store');



//RUTAS PRODUCCION
Route::get('/produccionGanadero', [ProduccionController::class, 'indexGanadero'])->name('Ganadero.produccion.index');
Route::get('/produccionAdministrador', [ProduccionController::class, 'indexAdministrador'])->name('Administrador.produccion.index');
Route::get('/produccionGestor', [ProduccionController::class, 'indexGestor'])->name('Gestor.produccion.index');

Route::get('/produccion/crear', [ProduccionController::class, 'create'])->name('Ganadero.produccion.create');
Route::post('/produccion', action: [ProduccionController::class, 'store'])->name('Ganadero.produccion.store');
Route::get('/produccion/{id}', action: [ProduccionController::class, 'show'])->name('Ganadero.produccion.show');
Route::get('/produccion/{id}/edit', action: [ProduccionController::class, 'edit'])->name('Ganadero.produccion.edit');
Route::put('/produccion/{id}/update', action: [ProduccionController::class, 'update'])->name('Ganadero.produccion.update');
Route::delete('/produccion/{id}/delete', [ProduccionController::class, 'destroy'])->name('Ganadero.produccion.destroy');
//Route::post('/produccion', [ProduccionController::class, 'store'])->name('produccion.store');



//RUTAS VISTAS DE PRODUCCION
Route::get('/produccionDetallada', [ProduccionController::class, 'indexDetallada'])->name('Ganadero.produccion.indexDetallada');



// Paquete de TRATAMIENTOS Y REPORTES

//Ruta de venta general para accedar a la pagina Tratamientos_Reportes 
Route::get('/tratamientosGanadero', [Tratamientos_ReportesController::class, 'indexGanadero'])->name('Ganadero.tratamientosReportes.index');
Route::get('/tratamientosAdministrador', [Tratamientos_ReportesController::class, 'indexAdministrador'])->name('Administrador.tratamientosReportes.index');
Route::get('/tratamientosGestor', [Tratamientos_ReportesController::class, 'indexGestor'])->name('Gestor.tratamientosReportes.index');

//Route::get('/tratamientos', [TratamientoController::class, 'index'])->name('tratamientos.index');
Route::get('/tratamientos/crear', [TratamientoController::class, 'createTratamiento'])->name('Ganadero.tratamientosReportes.createTratamiento');
Route::post('/tratamientos', action: [TratamientoController::class, 'store'])->name('Ganadero.tratamientosReportes.store');
Route::get('/tratamientos/{id}', action: [TratamientoController::class, 'show'])->name('Ganadero.tratamientosReportes.show');
Route::get('/tratamientos/{id}/edit', action: [TratamientoController::class, 'edit'])->name('Ganadero.tratamientosReportes.edit');
Route::put('/tratamientos/{id}/update', action: [TratamientoController::class, 'update'])->name('Ganadero.tratamientosReportes.update');
Route::delete('/tratamientos/{id}/delete', [TratamientoController::class, 'destroy'])->name('Ganadero.tratamientosReportes.destroy');

//Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
Route::get('/reportes/crear', [ReporteController::class, 'createReporte'])->name('Ganadero.tratamientosReportes.createReporte');
Route::post('/reportes', action: [ReporteController::class, 'store'])->name('Ganadero.tratamientosReportes.storeR');
Route::get('/reportes/{id}', action: [ReporteController::class, 'show'])->name('Ganadero.tratamientosReportes.showR');
Route::get('/reportes/{id}/edit', action: [ReporteController::class, 'edit'])->name('Ganadero.tratamientosReportes.editR');
Route::put('/reportes/{id}/update', action: [ReporteController::class, 'update'])->name('Ganadero.tratamientosReportes.updateR');
Route::delete('/reportes/{id}/delete', [ReporteController::class, 'destroy'])->name('Ganadero.tratamientosReportes.destroyR');



// VENTAS PRODUCCION
Route::get('/ventasGanadero', [VentaController::class, 'indexGanadero'])->name('Ganadero.ventas.index');
Route::get('/ventasAdministrador', [VentaController::class, 'indexAdministrador'])->name('Administrador.ventas.index');
Route::get('/ventasGestor', [VentaController::class, 'indexGestor'])->name('Gestor.ventas.index');

Route::get('/ventas/crearproduccion', [VentaController::class, 'createProduccion'])->name('Ganadero.ventas.createProduccion');
Route::post('/ventas', action: [VentaController::class, 'store'])->name('Ganadero.ventas.store');
Route::get('/ventas/{id}', action: [VentaController::class, 'show'])->name('Ganadero.ventas.show');
Route::get('/ventas/{id}/edit', action: [VentaController::class, 'edit'])->name('Ganadero.ventas.edit');
Route::put('/ventas/{id}/update', action: [VentaController::class, 'update'])->name('Ganadero.ventas.update');
Route::delete('/ventas/{id}/delete', [VentaController::class, 'destroy'])->name('Ganadero.ventas.destroy');
//Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');

// RUTAS PARA VISTAS DE VENTAS...
Route::get('/ventasDetallada', [VentaController::class, 'indexDetallada'])->name('Ganadero.ventas.indexDetallada');


// VENTAS GANADO
Route::get('/ventas/create/Ganado', [VentaGanadoController::class, 'create'])->name('Ganadero.ventas.create');
Route::post('/ventas_G', action: [VentaGanadoController::class, 'storeG'])->name('Ganadero.ventas.storeG');
Route::get('/ventas_G/{id}', action: [VentaGanadoController::class, 'showG'])->name('Ganadero.ventas.showG');
Route::get('/ventas_G/{id}/edit', action: [VentaGanadoController::class, 'editG'])->name('Ganadero.ventas.editG');
Route::put('/ventas_G/{id}/update', action: [VentaGanadoController::class, 'updateG'])->name('Ganadero.ventas.updateG');
Route::delete('/ventas_G/{id}/delete', [VentaGanadoController::class, 'destroyG'])->name('Ganadero.ventas.destroyG');


// RUTAS PUBLICACIONES

Route::get('/publicacionesGanadero',[PublicacionController::class,'indexGanadero'])->name('Ganadero.publicaciones.index');
Route::get('/publicacionesAdministrador',[PublicacionController::class,'indexAdministrador'])->name('Administrador.publicaciones.index');

Route::get('/publicaciones/create',[PublicacionController::class,'create'])->name('Ganadero.publicaciones.create');
Route::post('/publicaciones', action: [PublicacionController::class, 'store'])->name('Ganadero.publicaciones.store');
Route::get('/publicaciones/{id}', action: [PublicacionController::class, 'show'])->name('Ganadero.publicaciones.show');
Route::get('/publicaciones/{id}/edit', action: [PublicacionController::class, 'edit'])->name('Ganadero.publicaciones.edit');
Route::put('/publicaciones/{id}/update', action: [PublicacionController::class, 'update'])->name('Ganadero.publicaciones.update');
Route::delete('/publicaciones/{id}/delete', [PublicacionController::class, 'destroy'])->name('Ganadero.publicaciones.destroy');



// RUTAS DASHBOARD
Route::get('/dashboardGanadero', [DashboardController::class, 'indexGanadero'])->name('Ganadero.dashboard.index');
Route::get('/dashboardAdministrador', [DashboardController::class, 'indexAdministrador'])->name('Administrador.dashboard.index');
Route::get('/dashboardGestor', [DashboardController::class, 'indexGestor'])->name('Gestor.dashboard.index');





