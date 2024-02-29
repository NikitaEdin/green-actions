<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//// DEV ////
Route::get('/test', function () {
    return view('landingpage');
});


//// HOME ////
Route::get('/', function(){return view('home');})->name('home');

//// Infomation pages////
Route::get('/sustainability', function(){return view('information.sustainability');})->name('sustainability');
// Route::get('/', function(){return view('our-mission');})->name('our-mission');
// Route::get('/', function(){return view('about-competition');})->name('about-competition');
// Route::get('/', function(){return view('about-us');})->name('about-us');
// Route::get('/', function(){return view('terms');})->name('terms');
// Route::get('/', function(){return view('pricing');})->name('pricing');

//// Register ////
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

//// Login ////
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//// User Profile ////
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');