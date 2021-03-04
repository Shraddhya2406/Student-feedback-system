<?php

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

Route::get('/registration', function () {
    return view('registration');
});
Route::post('/registration','App\Http\Controllers\AuthController@registration');

Route::get('/signin', function () {
    return view('signin');
});
Route::post('/signin','App\Http\Controllers\AuthController@signin');

Route::get('/dashboard','App\Http\Controllers\DashboardController@gotoDashboard');

Route::post('/dashboard', 'App\Http\Controllers\FeedbackController@GiveFeedback');

Route::get('/questions', 'App\Http\Controllers\FeedbackController@FetchQuestions');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
