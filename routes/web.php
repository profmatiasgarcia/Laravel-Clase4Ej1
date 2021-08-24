<?php
/*Copyright (C) 2019 Prof Matias Garcia para -http://www.profmatiasgarcia.com.ar- con licencia GNU GPL3.
Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los términos de la Licencia Pública General de GNU según es publicada por la Free Software Foundation, bien con la versión 3 de dicha Licencia o bien (según su elección) con cualquier versión posterior. Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de GNU para más detalles.
Debería haber recibido una copia de la Licencia Pública General junto con este programa. Si no ha sido así ingrese a -http://www.gnu.org/licenses/-*/

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LotoController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/loto', [LotoController::class, 'index'])->name('loto');

Route::get('/loto/elegir', [LotoController::class, 'elegir'])->name('elegir');

Route::post('/loto/verificar', [LotoController::class, 'verificar'])->name('verificar');

/* -----------EJEMPLO CRUD----------- */

Route::get('/inicio/{todos?}', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('inicio');

Route::get('/formulario/crear', [App\Http\Controllers\EmpleadoController::class, 'formCrear'])->name('formulario.crear');

Route::get('/formulario/editar/{id}', [App\Http\Controllers\EmpleadoController::class, 'formEditar'])->name('formulario.editar');

Route::post('empleado/crear', [App\Http\Controllers\EmpleadoController::class, 'store'])->name('empleado.crear');

Route::get('empleado/{id}', [App\Http\Controllers\EmpleadoController::class, 'show'])->name('empleado.show');

Route::post('empleado/actualizar/{id}', [App\Http\Controllers\EmpleadoController::class, 'update'])->name('empleado.update');

Route::get('invertir/estatus/{id}', [App\Http\Controllers\EmpleadoController::class, 'cambiarEstatus'])->name('empleado.cambiarEstatus');

Route::get('eliminar/{id}', [App\Http\Controllers\EmpleadoController::class, 'destroy'])->name('empleado.destroy');
