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

Route::get('/add_user', function () {
    return view('registration');
});
Route::post('/add_user','App\Http\Controllers\AuthController@registration');

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/signout', 'App\Http\Controllers\AuthController@signout');

Route::post('/signin','App\Http\Controllers\AuthController@signin');

Route::put('/signin','App\Http\Controllers\AuthController@ResetPassword');

Route::get('/dashboard','App\Http\Controllers\DashboardController@gotoDashboard');

Route::get('/account','App\Http\Controllers\AccountController@FetchAccount');

Route::post('/account','App\Http\Controllers\AccountController@SaveAccount');

Route::get('/edit_user', function () {
    return view('account');
});

Route::post('/edit_user','App\Http\Controllers\AccountController@FetchUserByAdmin');

Route::put('/edit_user','App\Http\Controllers\AccountController@EditUserByAdmin');

Route::post('/dashboard', 'App\Http\Controllers\FeedbackController@GiveFeedback');

Route::get('/questions', 'App\Http\Controllers\FeedbackController@FetchQuestions');

Route::get('/feedbacks', 'App\Http\Controllers\FeedbackController@FetchFeedback');

Route::get('/get_feedbacks', 'App\Http\Controllers\FeedbackController@FetchFaculty');

Route::get('/admin_account','App\Http\Controllers\AccountController@FetchAccount');

Route::post('/admin_account','App\Http\Controllers\AccountController@SaveAccount');

Route::post('/delete_user','App\Http\Controllers\AccountController@DeleteUserByAdmin');

Route::get('/forgot_password', function(){
    return view('forgot_password');
});

Route::get('/add_question', function () {
    return view('add_question');
});

Route::post('/add_question','App\Http\Controllers\FeedbackController@AddQuestions');

Route::get('/edit_question', 'App\Http\Controllers\FeedbackController@FetchQuestions');

Route::post('/edit_question','App\Http\Controllers\FeedbackController@EditQuestions');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


