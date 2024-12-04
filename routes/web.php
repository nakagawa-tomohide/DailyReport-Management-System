<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('reports')->group(function () {
    Route::get('/', [ReportController::class, 'index']);
    Route::get('/add', [ReportController::class, 'add']);
    Route::post('/add', [ReportController::class, 'add']);
    Route::get('/{id}/edit', [ReportController::class, 'edit']);
    Route::put('/{id}', [ReportController::class, 'update']);
    Route::get('/fetchReports', [ReportController::class, 'fetchReports']);
    Route::get('/{id}/delete', [ReportController::class, 'delete']);
});
