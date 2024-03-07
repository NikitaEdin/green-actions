<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\SettingsController;
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
// Route::get('/settings', function () {
//     return view('settings');
// });


//// HOME ////
Route::get('/', function(){return view('home');})->name('home');
Route::get('/home', function(){return view('home');})->name('home');

//// Infomation pages////
Route::get('/sustainability', function(){return view('information.sustainability');})->name('sustainability');
// Route::get('/', function(){return view('our-mission');})->name('our-mission');
// Route::get('/', function(){return view('about-competition');})->name('about-competition');
// Route::get('/', function(){return view('about-us');})->name('about-us');
// Route::get('/', function(){return view('terms');})->name('terms');
// Route::get('/', function(){return view('pricing');})->name('pricing');

//// Register ////
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');

//// Login ////
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//// Forgot password ////
Route::get('/forgot-password', [ForgotPasswordController::class, 'show'])->name('forgot-password')->middleware('guest');


//// User Profile ////
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');
// edit profile
Route::get('/profile/edit', [UserController::class, 'updateDetails'])->middleware('auth')->name('updateDetails');
Route::post('/profile/edit', [UserController::class, 'update'])->middleware('auth');

// Users (public view)
Route::get('/users/{id}', [UserController::class, 'showUser'])->name('user.show');


//// Account Settings ////
Route::get('/settings', [SettingsController::class, 'show'])->middleware('auth')->name('settings');
