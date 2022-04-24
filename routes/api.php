<?php

use App\Http\Controllers\AnswerApiController;
use App\Http\Controllers\QuestionApiController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/', [QuestionApiController::class, 'index'])->name('questions.index');
Route::resource('questions', QuestionApiController::class)->only(['show', 'store', 'update', 'destroy']);
Route::resource('questions.answers', AnswerApiController::class)->only(['store', 'destroy', 'update']);
