<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminReportController;


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

Route::get('/myPage', [UserController::class, 'myPage'])->name('myPage');
Route::put('/myEdit', [UserController::class, 'myEdit'])->name('myEdit');

// 管理者用Route
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('home', function () {
            return view('admin.home');
        })->name('admin.home');

        Route::get('/report', [AdminReportController::class, 'index'])->name('admin.index');

        Route::get('/calendar', function() {
            return view('calendar');
        });
    });
});