<?php

use App\Http\Controllers\GradesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CoordinatorsController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\DualSheetsController;
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

Route::resource('/students', StudentsController::class)
    ->middleware('auth');
Route::resource('/tutors', TutorsController::class)
    ->middleware('auth');
Route::resource('/coordinators', CoordinatorsController::class)
    ->middleware('auth');
Route::resource('/companies', CompaniesController::class)
    ->middleware('auth');
Route::resource('/sheets', DualSheetsController::class)
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

Route::get('/chart', [ChartsController::class, 'index'])->name('charts');
Route::get('/chart/fails', [ChartsController::class, 'failsChart']);
