<?php

use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\User\PersonController;
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
    return view('user/home');
});
Route::get('/excel', function () {
    return view('excel');
});
Route::get('/pagea', function () {
    return view('admin/pageA');
});
Route::get('/pageb', function () {
    return view('admin/pageB');
});
Route::get('/userConfirm', function () {
    return view('userConfirm');
});
Route::get('/profile', function () {
    return view('myProfile');
});
Route::get('/order', function () {
    return view('orderDetails');
});
Route::get('/exist', function () {
    return view('existingUser');
});
Route::get('user-registration', [UserController::class, 'index'])->name('user-registration');

Route::post('user-store', [UserController::class, 'userPostRegistration'])->name('user-store');
Route::post('login', [UserController::class, 'userPostLogin'])->name('login');

Route::get('/login', [UserController::class, 'userLoginIndex'])->name('loginuser');

Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard', [DashbordController::class, 'index'])->name('dashboard');

    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});


Route::post('findByMobileNumber', [PersonController::class, 'findByMobileNumber']);
Route::post('setUserType', [PersonController::class, 'setUserType']);
Route::post('storeUserCredential', [PersonController::class, 'storeUserCredential']);
Route::post('storeOrder', [PersonController::class, 'storeOrder']);

Route::get('orderPage/{type}', [PersonController::class, 'orderPage']);