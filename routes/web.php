<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SecController\AuthSecController;

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

Route::get('/', function () {
    return view('users.pages.index');
})->name('index.get');

// admin index homepage

// user authentication
// get auth
Route::get('/register', [AuthController::class, 'registerPage'])->name('register.get');
Route::get('/login', [AuthController::class, 'loginPage'])->name('login.get');
Route::get('/forgot', [AuthController::class, 'forgotPage'])->name('forgot.get');
Route::get('/reset/{token}/password', [AuthController::class, 'resetPasswordPage'])->name('reset-password.get');
// post auth
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/forgot', [AuthController::class, 'forgot'])->name('forgot.post');
Route::post('/reset', [AuthController::class, 'reset'])->name('reset.post');



// second auth

// get Auth

Route::get('/register', [AuthSecController::class, 'registersecPage'])->name('registersec.get');
Route::get('/login', [AuthSecController::class, 'loginsecPage'])->name('loginsec.get');
Route::get('/forgot', [AuthSecController::class, 'forgotsecPage'])->name('forgotsec.get');
Route::get('/resetsec/{token}/password', [AuthSecController::class, 'resetsecpassword'])->name('resetsec-password.get');


// post auth
Route::post('/registersec', [AuthSecController::class, 'registersec'])->name('registersec.post');
Route::post('/loginsec', [AuthSecController::class, 'loginsec'])->name('loginsec.post');
Route::post('/forgotsec', [AuthSecController::class, 'forgotsec'])->name('forgotsec.post');
Route::post('/resetsec', [AuthSecController::class, 'resetsec'])->name('resetsec.post');
