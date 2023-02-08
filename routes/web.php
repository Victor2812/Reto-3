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
use App\Http\Controllers\SchoolYearsController;
use App\Http\Controllers\TutorsController;
use App\Models\Course;
use App\Models\DiaryEvaluation;
use App\Models\DualSheet;
use App\Models\Frase;
use App\Models\SchoolYear;
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

Route::resource('/diaries', DiaryController::class)
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
Route::get('/stats', [ChartsController::class, 'stats']);
Route::get('/lineData', [ChartsController::class, 'lineData']);

Route::get('/frases', function (){
    return new JsonResponse(Frase::all());
});
