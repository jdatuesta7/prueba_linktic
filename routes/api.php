<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::prefix('/tasks')
    ->controller(TaskController::class)
    ->group(function () {
        Route::get('/', 'index')->name('tasks.index');
        Route::post('/', 'store')->name('tasks.store');
        Route::get('/{id}', 'show')->name('tasks.show');
        Route::put('/{id}', 'update')->name('tasks.update');
        Route::delete('/{id}', 'destroy')->name('tasks.destroy');
    });
    
