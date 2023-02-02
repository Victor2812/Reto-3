<?php

use App\Http\Controllers\GradesController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\CoordinatorsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TutorsController;
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

Route::redirect('/', 'dashboard');


Route::get('/login', [LoginController::class, 'form'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('/alumnos', AlumnosController::class)
    ->middleware('auth');
Route::resource('/tutors', TutorsController::class)
    ->middleware('auth');
Route::resource('/coordinators', CoordinatorsController::class)
    ->middleware('auth');

Route::resource('/grades', GradesController::class)
    ->middleware('auth');

Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Ruutas API
|--------------------------------------------------------------------------
|
| ...
|
*/

