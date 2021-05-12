<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/question', [QuestionController::class, 'question']);
Route::get('/question/{page}', [QuestionController::class, 'page'])->name('question.page');
Route::post('/save-score', [QuestionController::class, 'saveScore']);
Route::get('/clear', [QuestionController::class, 'delete_session']);
Route::get('/get', [QuestionController::class, 'get_session']);

Route::get('/form', function() {
    return view('form_data');
});
Route::post('/store', [QuestionController::class, 'store']);