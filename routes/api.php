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
    Route::get('usertips', [UserController::class, 'userTips'])->name('api.user.tips');
    Route::get('edit', [UserController::class, 'edit'])->name('api.user.edit');
    Route::post('update', [UserController::class, 'update'])->name('api.user.update');
});

Route::get('lasttips', [TipController::class, 'lastTips'])->name('api.tip.lasttips');

Route::middleware('auth:sanctum')->group(function(){
    Route::get('tips', [TipController::class, 'index'])->name('api.tip.tips');
    Route::post('add', [TipController::class, 'store'])->name('api.tip.add');
    Route::get('edit/{id}', [TipController::class, 'show'])->name('api.tip.edit');
    Route::post('update/{id}', [TipController::class, 'update'])->name('api.tip.update');
    Route::delete('delete/{id}', [TipController::class, 'destroy'])->name('api.tip.destroy');
  });
