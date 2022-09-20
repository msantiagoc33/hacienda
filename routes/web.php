<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartamentoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



require __DIR__.'/auth.php';


Route::get('/index',                 [ApartamentoController::class, 'index'])->name('index')->middleware(['auth']);
Route::get('/',                      [ApartamentoController::class, 'index'])->name('index')->middleware(['auth']);
Route::get('huespedes',              [ApartamentoController::class, 'huespedes'])->name('huespedes')->middleware(['auth']);
Route::get('paises',                 [ApartamentoController::class, 'paises'])->name('paises')->middleware(['auth']);
Route::get('conceptos',              [ApartamentoController::class, 'conceptos'])->name('conceptos')->middleware(['auth']);
Route::get('gastos',                 [ApartamentoController::class, 'gastos'])->name('gastos')->middleware(['auth']);
Route::get('historico',              [ApartamentoController::class, 'historico'])->name('historico')->middleware(['auth']);
Route::get('hospedajes',             [ApartamentoController::class, 'hospedajes'])->name('hospedajes')->middleware(['auth']);
Route::get('plataformas',            [ApartamentoController::class, 'plataformas'])->name('plataformas')->middleware(['auth']);
Route::get('usuarios',               [ApartamentoController::class, 'usuarios'])->name('usuarios')->middleware(['auth']);
Route::get('logout',                 [ApartamentoController::class, 'logout'])->name('logout')->middleware(['auth']);

Route::get('modificarIngreso/{id}',  [ApartamentoController::class, 'modificarIngreso'])->name('modificarIngreso')->middleware(['auth']);
Route::get('modificarGasto/{id}',    [ApartamentoController::class, 'modificarGasto'])->name('modificarGasto')->middleware(['auth']);
Route::get('modificarHuesped/{id}',  [ApartamentoController::class, 'modificarHuesped'])->name('modificarHuesped')->middleware(['auth']);
Route::get('modificarConcepto/{id}', [ApartamentoController::class, 'modificarConcepto'])->name('modificarConcepto')->middleware(['auth']);
Route::get('modificarHistorico/{id}',[ApartamentoController::class, 'modificarHistorico'])->name('modificarHistorico')->middleware(['auth']);

Route::get('nuevoIngreso',           [ApartamentoController::class, 'nuevoIngreso'])->name('nuevoIngreso')->middleware(['auth']);
Route::get('nuevoGasto',             [ApartamentoController::class, 'nuevoGasto'])->name('nuevoGasto')->middleware(['auth']);
Route::get('nuevoHuesped',           [ApartamentoController::class, 'nuevoHuesped'])->name('nuevoHuesped')->middleware(['auth']);
Route::get('nuevoConcepto',          [ApartamentoController::class, 'nuevoConcepto'])->name('nuevoConcepto')->middleware(['auth']);

Route::get('verIngreso/{id}',        [ApartamentoController::class, 'verIngreso'])->name('verIngreso')->middleware(['auth']);
Route::get('verHuesped/{id}',        [ApartamentoController::class, 'verHuesped'])->name('verHuesped')->middleware(['auth']);
Route::get('verGasto/{id}',          [ApartamentoController::class, 'verGasto'])->name('verGasto')->middleware(['auth']);
Route::get('verHistorico/{id}',      [ApartamentoController::class, 'verHistorico'])->name('verHistorico')->middleware(['auth']);

Route::post('grabaIngreso',          [ApartamentoController::class, 'grabaIngreso'])->name('grabaIngreso')->middleware(['auth']);
Route::post('grabaGasto',            [ApartamentoController::class, 'grabaGasto'])->name('grabaGasto')->middleware(['auth']);
Route::post('grabaHuesped',          [ApartamentoController::class, 'grabaHuesped'])->name('grabaHuesped')->middleware(['auth']);
Route::post('grabaConcepto',         [ApartamentoController::class, 'grabaConcepto'])->name('grabaConcepto')->middleware(['auth']);

Route::put('updateIngreso/{id}',     [ApartamentoController::class, 'updateIngreso'])->name('updateIngreso')->middleware(['auth']);
Route::put('updateGasto/{id}',       [ApartamentoController::class, 'updateGasto'])->name('updateGasto')->middleware(['auth']);
Route::put('updateHuesped/{id}',     [ApartamentoController::class, 'updateHuesped'])->name('updateHuesped')->middleware(['auth']);
Route::put('updateConcepto/{id}',    [ApartamentoController::class, 'updateConcepto'])->name('updateConcepto')->middleware(['auth']);
Route::put('updateHistorico/{id}',   [ApartamentoController::class, 'updateHistorico'])->name('updateHistorico')->middleware(['auth']);

Route::delete('eliminarHuesped/{id}',   [ApartamentoController::class, 'eliminarHuesped'])->name('eliminarHuesped')->middleware(['auth']);
Route::delete('eliminarIngreso/{id}',   [ApartamentoController::class, 'eliminarIngreso'])->name('eliminarIngreso')->middleware(['auth']);
Route::delete('eliminarGasto/{id}',     [ApartamentoController::class, 'eliminarGasto'])->name('eliminarGasto')->middleware(['auth']);
Route::delete('eliminarConcepto/{id}',  [ApartamentoController::class, 'eliminarConcepto'])->name('eliminarConcepto')->middleware(['auth']);
Route::delete('eliminarHistorico/{id}', [ApartamentoController::class, 'eliminarHistorico'])->name('eliminarHistorico')->middleware(['auth']);
