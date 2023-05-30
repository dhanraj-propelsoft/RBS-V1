<?php

use App\Http\Controllers\UserController;
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
    return view('login');
});
Route::get('user-registration', [UserController::class, 'index'])->name('user-registration');
Route::get('user-login', [UserController::class, 'userLoginIndex'])->name('user-login');
Route::post('user-store', [UserController::class, 'userPostRegistration'])->name('user-store');
Route::post('login', [UserController::class, 'userPostLogin'])->name('login');

Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
