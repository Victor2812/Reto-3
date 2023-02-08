<?php

use App\Http\Controllers\GradesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CoordinatorsController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CompanyEvaluationsController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\DiaryEntryController;
use App\Http\Controllers\DiaryEvaluationController;
use App\Http\Controllers\DualSheetsController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\FollowUpEntriesController;
use App\Http\Controllers\JobEvaluationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TutorsController;
use App\Models\Course;
use App\Models\DiaryEvaluation;
use App\Models\Frase;
use Illuminate\Http\JsonResponse;
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

Route::resource('/grades', GradesController::class)
    ->middleware('auth');

Route::resource('/sheets', DualSheetsController::class)
    ->middleware('auth');

Route::resource('/diaries', DiaryController::class)
    ->middleware('auth');

Route::resource('/jobev', JobEvaluationController::class)
    ->middleware('auth');

Route::resource('/diaryev', DiaryEvaluationController::class)
    ->middleware('auth');

Route::resource('/dualSheets', DualSheetsController::class)
->middleware('auth');

Route::resource('/diaryEvaluations', DiaryEvaluationController::class)
->middleware('auth');

Route::resource('/companyEvaluations', CompanyEvaluationsController::class)
->middleware('auth');

Route::resource('/diaryEntries', DiaryEntryController::class)
->middleware('auth');

Route::resource('/followUpEntries', FollowUpEntriesController::class)
->middleware('auth');

Route::resource('/followUps', FollowUpController::class)
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

Route::get('/gay', function (){
    return new JsonResponse(Frase::all());
});

Route::get('/stats', function () {
    return new JsonResponse([
        [
            "item" => "Aprobado",
            "count"=> 80,
            "color" => "#0C4395",
        ],
        [
            "item" => "Suspendido",
            "count" => 20,
            "color" => "#24C8AF",
        ]
    ]);
});

Route::get('/lineData', function() {
    return new JsonResponse([
        [
            "year" => "19-20",
            "count" => [
                "aprobados" => 80,
                "suspensos" => 20,
            ]
        ],
        [
            "year" => "20-21",
            "count" => [
                "aprobados" => 60,
                "suspensos" => 40,
            ]
        ],
        [
            "year" => "21-22",
            "count" => [
                "aprobados" => 70,
                "suspensos" => 30,
            ]
        ],
        [
            "year" => "22-23",
            "count" => [
                "aprobados" => 10,
                "suspensos" => 90,
            ]
        ]
    ]);
});
