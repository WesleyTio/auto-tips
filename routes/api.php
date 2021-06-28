<?php

use App\Http\Controllers\API\TipController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){
    Route::get('edit', [UserController::class, 'edit'])->name('api.resgister.edit');
    Route::post('update', [UserController::class, 'update'])->name('api.resgister.update');
});

Route::get('lasttips', [TipController::class, 'lastTips'])->name('api.tip.lasttips');

Route::middleware('auth:sanctum')->group(function(){
    Route::get('edit', [TipController::class, 'edit'])->name('api.tip.edit');
    Route::post('update', [TipController::class, 'update'])->name('api.tip.update');
    Route::get('edit', [TipController::class, 'edit'])->name('api.tip.edit');
    Route::post('update', [TipController::class, 'update'])->name('api.tip.update');
});
