<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('login', [Dashboard\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [Dashboard\Auth\LoginController::class, 'login'])->name('login');
    Route::post('logout', [Dashboard\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/', [Dashboard\HomeController::class, 'index'])->name('home');
});
