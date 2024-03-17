<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LeaderboardsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SubController;
use App\Http\Controllers\TicketController;
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
Route::get('/leaderboards', [LeaderboardsController::class, 'show'])->name('leaderboards');

// Legal pages
Route::get('/terms-and-conditions', function(){return view('information.terms');})->name('terms');
Route::get('/privacy-policy', function(){return view('information.privacy');})->name('privacy');

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


//// Support Tickets ////
Route::get('/tickets', [TicketController::class, 'show'])->middleware('auth')->name('tickets');
Route::post('/tickets', [TicketController::class, 'newTicket'])->middleware('auth')->name('newTicket');

// Specific ticket
Route::get('/ticket/{id}', [TicketController::class, 'ticket'])->middleware('auth')->name('ticket');
Route::post('/ticket/{id}/add-message', [TicketController::class, 'addMessage'])->middleware('auth')->name('ticket.add-message');
Route::post('/ticket/{id}/update-status', [TicketController::class, 'updateStatus'])->middleware('auth')->name('ticket.update-status');


//// Subscription ////
Route::get('/subscription', [SubController::class, 'show'])->middleware('auth')->name('sub'); 


//// Store ////
Route::get('/shop', [ShopController::class, 'show'])->name('shop');
Route::get('/cart', [ShopController::class, 'cart'])->middleware('auth')->name('cart');
Route::post('/cart', [ShopController::class, 'confirm'])->middleware('auth')->name('submit-cart');

Route::get('/cart-payment', [ShopController::class, 'pay'])->middleware('auth')->name('pay-cart');
