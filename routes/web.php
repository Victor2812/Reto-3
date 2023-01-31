<?php
use App\Http\Controllers\GradosController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('pruebas');
});
*/
//Auth::routes();
Route::get('/login', [LoginController::class, 'form'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


// View listado de alumnoos
Route::get('/alumnos', [AlumnosController::class, 'index'])->middleware('auth')->name('alumnos');

// View listado de grados
Route::get('/grados', [GradosController::class, 'index'])->middleware('auth')->name('grados');
Route::get('/grados-new', [GradosController::class, 'create'])->middleware('auth')->name('newGrado');
Route::post('/grados-new', [GradosController::class, 'store'])->middleware('auth')->name('newGrado');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Ruutas API
|--------------------------------------------------------------------------
|
| ...
|
*/
