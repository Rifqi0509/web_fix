<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\flutter\AuthController;
use App\Http\Controllers\flutter\DataController;
use App\Http\Controllers\flutter\VipsController;
use App\Http\Controllers\flutter\QuestionController;
use App\Http\Controllers\ApiImageController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/user_flutter', [AuthController::class, 'show']);
Route::post('/login_flutter', [AuthController::class, 'login']);
Route::post('/register_flutter', [AuthController::class, 'register']);
Route::post('/feedback_flutter', [DataController::class, 'feedback']);
Route::get('/vip_flutter/{nama}', [VipsController::class, 'show']);
Route::post('/vips_flutter', [VipsController::class, 'store']);
Route::get('/questions_flutter', [QuestionController::class, 'show']);
Route::post('/survey_flutter', [QuestionController::class, 'store']);
Route::post('/update_profile', [AuthController::class, 'updateProfile']);
Route::post('/upload-image', [ApiImageController::class, 'upload']);
