<?php

use App\Models\SuperUsuario;
use App\Models\EducacionVacante;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FuncionController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\OcupacionController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ReclutadorController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\RestablecerController;
use App\Http\Controllers\SuperUsuarioController;
use App\Http\Controllers\EducacionVacanteController;

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

// Ruta principal welcome
Route::get('/', function () {
    return view('welcome');
})->name('welcome')->middleware('guest');


// ---------------------------- RUTAS DEL CONTROLADOR USER ---------------------------------------
Route::get('user/create', [UserController::class, 'create'])->name('user.create')->middleware('guest');
Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::post('user/uptade/rol/{id}', [UserController::class, 'cambioRol'])->name('update.rol');  
Route::get('user/restaurar/create', [UserController::class, 'restaurarCreate'])->name('restaurar.create')->middleware('auth');
Route::post('user/restaurar/contraseña', [UserController::class, 'restaurarContraseña'])->name('restaurar.contraseña');
Route::get('user/home/restaurar', [UserController::class, 'restaurarHome'])->name('home.restaurar');
// -----------------------------------------------------------------------------------------------


// ----------------------------- RUTAS DEL CONTROLADOR CANDIDATO ---------------------------------
Route::post('candidato/store', [CandidatoController::class, 'store'])->name('candidato.store');
// -----------------------------------------------------------------------------------------------


// ----------------------------- RUTAS DEL CONTROLADOR DEL SUPER USUARIO -------------------------
Route::get('super/index', [SuperUsuarioController::class, 'index'])->name('super.index')->middleware('auth');
Route::get('super/create', [SuperUsuarioController::class, 'create'])->name('super.create')->middleware('auth');
Route::post('super/store', [SuperUsuarioController::class, 'store'])->name('super.store');
Route::get('super/listar/instructores', [SuperUsuarioController::class, 'listarInstructores'])->name('listar.instructores')->middleware('auth');
Route::get('super/dashboard/super', [SuperUsuarioController::class, 'dashboardSuper'])->name('dashboard.super')->middleware('auth');
Route::get('super/dashboard/instructor', [SuperUsuarioController::class, 'dashboardInstructor'])->name('dashboard.instructor')->middleware('auth');
Route::get('super/dashboard/candidatos', [SuperUsuarioController::class, 'dashboardCandidato'])->name('dashboard.candidato')->middleware('auth');
// ----------------------------------------------------------------------------------------------


// --------------------------- RUTAS DEL CONTROLADOR INSTRUCTORES ------------------------------
Route::get('instructor/create', [InstructorController::class, 'create'])->name('instructor.create')->middleware('auth');
Route::post('instructor/store', [InstructorController::class, 'store'])->name('instructor.store');
// ----------------------------------------------------------------------------------------------


// --------------------------- RUTAS DEL CONTROLADOR RECLUTADOR ----------------------------------
Route::get('reclutador/index', [ReclutadorController::class, 'index'])->name('reclutador.index')->middleware('auth');
Route::get('reclutador/empresa', [ReclutadorController::class, 'createEmpresa'])->name('reclutador.empresa')->middleware('auth');
Route::post('reclutador/desvincular/{id}', [ReclutadorController::class, 'desvincular'])->name('reclutador.desvincular');
Route::post('reclutador/postulacion/{empresa}', [ReclutadorController::class, 'postulacion'])->name('reclutador.postulacion');
Route::post('reclutador/buscar', [ReclutadorController::class, 'buscar'])->name('reclutador.buscar');
// ----------------------------------------------------------------------------------------------


// --------------------------- RUTAS DEL CONTROLADOR EMPRESA ------------------------------------
Route::get('empresa/index', [EmpresaController::class, 'index'])->name('empresa.index')->middleware('auth');
Route::post('empresa/store', [EmpresaController::class, 'store'])->name('empresa.store');
Route::get('empresa/show/{id}', [EmpresaController::class, 'show'])->name('empresa.show')->middleware('auth');
Route::get('empresa/edit/{id}', [EmpresaController::class, 'edit'])->name('empresa.edit')->middleware('auth');
Route::put('empresa/update/{id}', [EmpresaController::class, 'update'])->name('empresa.update');
Route::delete('empresa/destroy/{id}', [EmpresaController::class, 'destroy'])->name('empresa.destroy');
// ----------------------------------------------------------------------------------------------

// --------------------- RUTAS PARA EL CONTROLADOR DE CONTRASEÑA NUEVA --------------------------
Route::get('restablecer/create', [RestablecerController::class, 'create'])->name('restablecer.create')->middleware('guest');
Route::post('restablecer/store', [RestablecerController::class, 'store'])->name('restablecer.store');
Route::get('restablecer/enviar/{id}/{token}', [RestablecerController::class, 'enviar'])->name('restablecer.enviar');
// ----------------------------------------------------------------------------------------------

// --------------------------- RUTAS DEL CONTROLADOR OCUPACIONES ------------------------------------
Route::get('ocupacion/create', [OcupacionController::class, 'create'])->name('ocupacion.create')->middleware('auth');
Route::get('ocupacion/show/{id}', [OcupacionController::class, 'show'])->name('ocupacion.show')->middleware('auth');
Route::post('ocupacion/store', [OcupacionController::class, 'store'])->name('ocupacion.store');
Route::put('ocupacion/update/{id}', [OcupacionController::class, 'update'])->name('ocupacion.update');
Route::delete('ocupacion/destroy/{id}', [OcupacionController::class, 'destroy'])->name('ocupacion.destroy');
// ---------------------------------------------------------------------------------------------------

// --------------------------- RUTAS DEL CONTROLADOR FUNCIONES ---------------------------------------
Route::get('funcion/create/{id}', [FuncionController::class, 'create'])->name('funcion.create')->middleware('auth');
Route::post('funcion/store/{id}', [FuncionController::class, 'store'])->name('funcion.store');
Route::get('funcion/edit/{ocupacion}/{id}', [FuncionController::class, 'edit'])->name('funcion.edit')->middleware('auth');
Route::put('funcion/update/{id}', [FuncionController::class, 'update'])->name('funcion.update');
Route::delete('funcion/destroy/{id}', [FuncionController::class, 'destroy'])->name('funcion.destroy');
// ---------------------------------------------------------------------------------------------------

// --------------------------- RUTAS DEL CONTROLADOR CARGOS ----------------------------------------
Route::get('cargo/create/{id}', [CargoController::class, 'create'])->name('cargo.create')->middleware('auth');
Route::post('cargo/store', [CargoController::class, 'store'])->name('cargo.store');
Route::get('cargo/show/{id}', [CargoController::class, 'show'])->name('cargo.show')->middleware('auth');
Route::get('cargo/edit/{id}', [CargoController::class, 'edit'])->name('cargo.edit')->middleware('auth');
Route::put('cargo/update/{id}', [CargoController::class, 'update'])->name('cargo.update');
Route::delete('cargo/destroy/{id}', [CargoController::class, 'destroy'])->name('cargo.destroy');
// ---------------------------------------------------------------------------------------------------


// --------------------------- RUTAS DEL CONTROLADOR VACANTES ----------------------------------------
Route::get('vacante.index/{id}', [VacanteController::class, 'index'])->name('vacante.index')->middleware('auth');
Route::get('vacante.create/{id}', [VacanteController::class, 'create'])->name('vacante.create')->middleware('auth');
Route::post('vacante.store', [VacanteController::class, 'store'])->name('vacante.store');
Route::get('vacante/show/{id}/{empresa}', [VacanteController::class, 'show'])->name('vacante.show')->middleware();
Route::post('vacante/buscar/{id}', [VacanteController::class, 'buscar'])->name('vacante.buscar');
Route::get('vacante/edit/{id}/{empresa}', [VacanteController::class, 'edit'])->name('vacante.edit')->middleware('auth');
Route::put('vacante/update/{id}/{empresa}', [VacanteController::class, 'update'])->name('vacante.update');
Route::delete('vacante/destroy/{id}', [VacanteController::class, 'destroy'])->name('vacante.destroy');
// ---------------------------------------------------------------------------------------------------


// --------------------------- RUTAS DEL CONTROLADOR EDUCACION VACANTES ------------------------------
Route::get('eduvacante/create/{vacante}/{empresa}', [EducacionVacanteController::class, 'create'])->name('eduvacante.create')->middleware('auth');
Route::post('eduvacante/store/{vacante}', [EducacionVacanteController::class, 'store'])->name('eduvacante.store');
Route::get('eduvacante/edit/{educacion}/{vacante}/{empresa}', [EducacionVacanteController::class, 'edit'])->name('eduvacante.edit')->middleware('auth');
Route::put('eduvacante/update/{vacante}/{educacion}', [EducacionVacanteController::class, 'update'])->name('eduvacante.update');
Route::delete('eduvacante/destroy/{id}', [EducacionVacanteController::class, 'destroy'])->name('eduvacante.destroy');
// ---------------------------------------------------------------------------------------------------


// --------------------------- RUTAS DEL CONTROLADOR LOGIN Y LOGOUTS ------------------------------
Route::get('login', [LoginController::class, 'create'])->name('login')->middleware('guest');
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
Route::post('logout', [LogoutController::class, 'store'])->name('logout');
// ----------------------------------------------------------------------------------------------
