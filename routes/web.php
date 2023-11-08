<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\Fase1ProyectoController;
use App\Http\Controllers\Fase2ProyectoController;
use App\Http\Controllers\LibroDiarioController;
use App\Http\Controllers\ManejoProyectoController;
use App\Http\Controllers\PlanCuentaController;
use App\Http\Controllers\ResponsableProyectoController;
use App\Http\Controllers\SaldoInicialAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;

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

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


});

Route::middleware(['auth'])->group(function () {
    // SE COLOCA LAS RURAS PROTEGIDAS

    /*-----------------------RUTA MODULO ADMINISTRACION------------------------------*/
Route::resource('admin',AdministradorController::class);
Route::get('/info', [AdministradorController::class,'info'])->name('admin.info');
Route::resource('users',UserController::class);
Route::resource('empleados',EmpleadoController::class);
Route::resource('planCuentas', PlanCuentaController::class);
Route::resource('saldoinicialAdmin', SaldoInicialAdminController::class);
Route::resource('libroDiario', LibroDiarioController::class);


/*------------------------------RUTA MANEJO PROYECTO-----------------------------*/
Route::resource('manejoProyectos', ManejoProyectoController::class);
Route::get('/fasesProyectos', [ManejoProyectoController::class,'fasesProyectos'])->name('manejoProyectos.fasesProyectos');
Route::resource('responsableProyectos', ResponsableProyectoController::class);
Route::resource('fase1Proyectos', Fase1ProyectoController::class);
Route::post('/envioDatosBanco', [Fase1ProyectoController::class,'envioDatosBanco'])->name('fase1Proyectos.envioDatosBanco');
Route::resource('fase2Proyectos', Fase2ProyectoController::class);


/*-------------------------------RUTA MODULO CONTADOR--------------------------------------*/
Route::get('/contador', [ContadorController::class,'contador'])->name('contador');
Route::get('/libroMovimientos', [ContadorController::class,'libroMovimientos'])->name('libroMovimientos');
Route::get('/libroMayor', [ContadorController::class,'libroMayor'])->name('libroMayor');
Route::get('/balanceGeneral', [ContadorController::class,'balanceGeneral'])->name('balanceGeneral');
Route::get('/estadoResultados', [ContadorController::class,'estadoResultados'])->name('estadoResultados');

/*-------------------------------RUTA MODULO USUARIO--------------------------------------*/
Route::get('/usuario', [UsuarioController::class,'usuario'])->name('usuario');

});








