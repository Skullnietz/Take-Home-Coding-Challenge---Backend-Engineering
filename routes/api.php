<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/profiles', [ProfileController::class, 'store']);
Route::get('/profile/{id}', [ProfileController::class, 'show']);
Route::get('/profiles', [ProfileController::class, 'index']);
Route::patch('/profile/{id}', [ProfileController::class, 'update']);
