<?php

use App\Http\Controllers\HomeController;
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

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [HomeController::class, 'login']);

Route::get('/register', function () {
    return view('register');
});

Route::post('register', [HomeController::class, 'registerUser']);

Route::get('/event', [HomeController::class, 'redirectToEventOrganizer']);

Route::get('/create_event', [HomeController::class, 'getCreateEvent']);
Route::post('/create_event', [HomeController::class, 'postCreateEvent']);


Route::get('/volunteer', function () {
    return view('volunteer');
});

Route::get('/supplier', function () {
    return view('supplier');
});
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
