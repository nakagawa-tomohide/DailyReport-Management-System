<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduleController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('reports')->group(function () {
    Route::get('/', [ReportController::class, 'index']);
    Route::get('/add', [ReportController::class, 'add']);
    Route::post('/add', [ReportController::class, 'add']);
    Route::get('/{id}/edit', [ReportController::class, 'edit']);
    Route::put('/{id}', [ReportController::class, 'update']);
    Route::get('/fetchReports', [ReportController::class, 'fetchReports']);
    Route::get('/{id}/delete', [ReportController::class, 'delete']);
});

Route::get('/calendar', function() {
    return view('calendar');
});

// イベント登録処理
Route::post('/schedule-add', [ScheduleController::class, 'scheduleAdd']);
// イベントの削除
Route::post('/schedule-delete', [ScheduleController::class, 'scheduleDelete']);
// イベント取得処理
Route::post('/schedule-get', [ScheduleController::class, 'scheduleGet']);