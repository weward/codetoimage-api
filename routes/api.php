<?php

use App\Http\Controllers\General\CodeStyleController;
use App\Http\Controllers\User\CodeController;
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

Route::namespace('General')->group(function() {
    Route::get('get-code-styles', [CodeStyleController::class, 'getcodeStyles'])->name('get-code-styles');
});

Route::namespace('User')->group(function() {
    Route::post('save-code', [CodeController::class, 'store'])->name('save-code');
});
