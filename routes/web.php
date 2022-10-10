<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SubscriptionController;

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

Route::resource('restaurants', RestaurantController::class)->only(['index', 'show']);

Route::middleware('auth')->group(function () {
    Route::resource('restaurants.reviews', ReviewController::class)->only('create', 'store', 'edit', 'update', 'destroy')->middleware('subscribed');
    Route::resource('restaurants.reservations', ReservationController::class)->only(['create', 'store'])->middleware('subscribed');
    Route::resource('reservations', ReservationController::class)->only(['index', 'destroy'])->middleware('subscribed');

    Route::get('subscription', [SubscriptionController::class, 'create'])->name('subscription.create');
    Route::post('subscription', [SubscriptionController::class, 'store'])->name('subscription.store');
    Route::get('subscription/cancel', [SubscriptionController::class, 'cancel'])->middleware('subscribed')->name('subscription.cancel');
    Route::post('subscription/destroy', [SubscriptionController::class, 'destroy'])->middleware('subscribed')->name('subscription.destroy');
});

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('login', [Dashboard\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [Dashboard\Auth\LoginController::class, 'login'])->name('login');
    Route::post('logout', [Dashboard\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/', [Dashboard\HomeController::class, 'index'])->name('home');
});

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'admin.auth'], function () {
    Route::get('users', [Dashboard\UserController::class, 'index'])->name('users.index');
    Route::resource('restaurants', Dashboard\RestaurantController::class);
    Route::resource('categories', Dashboard\CategoryController::class)->except('show');
});
