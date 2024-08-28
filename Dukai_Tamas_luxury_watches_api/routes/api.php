<?php

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

use App\Http\Controllers\WatchController;
use App\Http\Controllers\BrandController;

Route::get('/watches', [WatchController::class, 'getAllWatches']);
Route::get('/watches/{watch}', [WatchController::class, 'getWatchById']);
Route::post('/watches', [WatchController::class, 'storeWatch']);
Route::patch('/watches/{watch}', [WatchController::class, 'updateWatch']);
Route::delete('/watches/{watch}', [WatchController::class, 'deleteWatch']);
Route::get('/brands/{brand}/watches', [BrandController::class, 'getWatchesByBrand']);
