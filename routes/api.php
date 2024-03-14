<?php

use App\Http\Controllers\AuthConroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SurveyController;
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

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [AuthConroller::class, 'logout']);
    Route::get('/me', [AuthConroller::class, 'me']);
    Route::apiResource('survey', SurveyController::class);
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::post('/signup', [AuthConroller::class, 'signup']);
Route::post('/login', [AuthConroller::class, 'login']);
Route::get('/survey/get-by-slug/{survey:slug}', [SurveyController::class, 'getBySlug']);
Route::post('/survey/{survey}/answer', [SurveyController::class, 'storeAnswer']);