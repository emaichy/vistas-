<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\MunicipiosController;
use App\Http\Controllers\PacientesController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/*
|--------------------------------------------------------------------------

*/
//--------------------------------------------------------------------------
                //pacientes rutas


Route::resource('pacientes', PacientesController::class);

Route::get('pacientes', [PacientesController::class, 'index'])->name('pacientes.index');
Route::get('pacientes/create', [PacientesController::class, 'create'])->name('pacientes.create');
Route::post('pacientes', [PacientesController::class, 'store'])->name('pacientes.store');
Route::get('pacientes/{id}', [PacientesController::class, 'show'])->name('pacientes.show');
Route::get('pacientes/{id}/edit', [PacientesController::class, 'edit'])->name('pacientes.edit');
Route::put('pacientes/{id}', [PacientesController::class, 'update'])->name('pacientes.update');
Route::delete('pacientes/{id}', [PacientesController::class, 'destroy'])->name('pacientes.destroy');

 Route::resource('estados', EstadosController::class);
Route::resource('municipios', MunicipiosController::class);

use App\Http\Controllers\AlumnosController;

Route::resource('alumnos', AlumnosController::class);

use App\Http\Controllers\AsignacionPacientesAlumnosController;

Route::resource('asignaciones', AsignacionPacientesAlumnosController::class);


use App\Http\Controllers\UsuariosController;

Route::resource('usuarios', UsuariosController::class);


Route::resource('maestros', App\Http\Controllers\MaestrosController::class);


use App\Http\Controllers\GruposController;

Route::resource('grupos', GruposController::class);


use App\Http\Controllers\SemestreController;

Route::resource('semestres', SemestreController::class);


use App\Http\Controllers\ExpedienteController;

Route::resource('expedientes', ExpedienteController::class);

//--------------------------------------------------------------------------

