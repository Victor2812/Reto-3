<?php

use App\Http\Controllers\GradesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CoordinatorsController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CompanyEvaluationsController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\DiaryEvaluationController;
use App\Http\Controllers\DualSheetsController;
use App\Http\Controllers\FollowUpsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SchoolYearsController;
use App\Http\Controllers\TutorsController;
use App\Models\Frase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/dashboard', function(Request $request) {
    $person = $request->user()->person;

    if ($person->role_id == config('roles.ALUMNO')) {
        return Redirect::route('students.show', [$person->id]);
    }

    return view('dashboard');
})->middleware('auth')->name('dashboard');

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

Route::resource('/grades', GradesController::class)
    ->middleware('auth');

Route::resource('/dualSheets', DualSheetsController::class)
    ->middleware('auth');

Route::resource('/diaryEvaluations', DiaryEvaluationController::class)
    ->middleware('auth');

Route::resource('/companyEvaluations', CompanyEvaluationsController::class)
    ->middleware('auth');

Route::resource('dualSheets.diaryEntries', DiaryController::class)
    ->middleware('auth');

Route::resource('dualSheets.followUps', FollowUpsController::class)
    ->middleware('auth');

Route::get('/schoolyears/new', [SchoolYearsController::class, 'create'])->middleware('auth')->name('schoolyears.new');

/*
|--------------------------------------------------------------------------
| Ruutas API
|--------------------------------------------------------------------------
|
| ...
|
*/

Route::get('/chart', [ChartsController::class, 'index'])->name('charts');
Route::get('/stats', [ChartsController::class, 'stats'])->name('stats');
Route::get('/lineData', [ChartsController::class, 'lineData'])->name('lineData');

Route::get('/frases', function (){
    return new JsonResponse(Frase::all());
});
