<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/{any}', function(){
//     return view('App');
// })->where('any', '.*'); //補足：.*は、正規表現で0文字以上の任意の文字列を意味する


// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [QuestionController::class, 'index'])->name('questions.index');
Route::resource('questions', QuestionController::class)->only(['show', 'create', 'store']);
Route::resource('questions.answers', AnswerController::class)->only(['create', 'store']);
