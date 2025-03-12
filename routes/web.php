<?php


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\RoomTypeController;

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

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/rooms', [PageController::class, 'list_rooms'])->name('rooms.index');

Route::post('/rooms', [PageController::class, 'search'])->name('search');
Route::get('/profile', [PageController::class, 'showProfile'])->name('profile');
Route::put('/profile', [PageController::class, 'updateProfile']);

Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
/************************************
 *              Auth
 ************************************/
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'showRegistrationForm')->name('register');
    Route::post('register', 'register');

    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login');

    Route::post('logout', 'logout')->name('logout');
});

/************************************
 *              Admin
 ************************************/
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('orders', AdminOrderController::class);

    Route::resource('roomtypes', RoomTypeController::class)
        ->except('show');
    Route::resource('rooms', AdminRoomController::class)
        ->except('show');
});
