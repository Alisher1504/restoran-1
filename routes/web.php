<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Admin\ReservationController;

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

Route::get('/', [WelcomeController::class, 'index']);

// Frontend Category

Route::get('/categorys', [App\Http\Controllers\Frontend\CategoryController::class, 'index']);
Route::get('/categorys/{category}', [App\Http\Controllers\Frontend\CategoryController::class, 'show']);

// Frontend Menu

Route::get('/menus', [App\Http\Controllers\Frontend\MenuController::class, 'index']);

// Frontend Reservation

Route::get('/reservation/step-one', [App\Http\Controllers\Frontend\ReservationController::class, 'stepOne']);
Route::get('/reservation/step-two', [App\Http\Controllers\Frontend\ReservationController::class, 'stepTwo']);

// Admin

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function() {

    // Dashboard

    Route::get('/dashboard', [AdminController::class, 'index']);

    // category

    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::get('category/edit/{id}', [CategoryController::class, 'edit']);
    Route::put('category/update/{id}', [CategoryController::class, 'update']);
    Route::get('category/delete/{id}', [CategoryController::class, 'delete']);

    // menu

    Route::get('/menu', [MenuController::class, 'index']);
    Route::get('/menu/create', [MenuController::class, 'create']);
    Route::post('/menu/store', [MenuController::class, 'store']);
    Route::get('/menu/edit/{id}', [MenuController::class, 'edit']);
    Route::put('/menu/update/{id}', [MenuController::class, 'update']);
    Route::get('/menu/delete/{id}', [MenuController::class, 'delete']);

    // table

    Route::get('/table', [TableController::class, 'index']);
    Route::get('/table/create', [TableController::class, 'create']);
    Route::post('/table/store', [TableController::class, 'store']);
    Route::get('/table/edit/{id}', [TableController::class, 'edit']);
    Route::put('/table/update/{id}', [TableController::class, 'update']);
    Route::get('/table/delete/{id}', [TableController::class, 'delete']);

    // reservation

    Route::get('/reservation', [ReservationController::class, 'index']);
    Route::get('/reservation/create', [ReservationController::class, 'create']);
    Route::post('/reservation/store', [ReservationController::class, 'store']);
    Route::get('/reservation/edit/{id}', [ReservationController::class, 'edit']);
    Route::put('/reservation/update/{id}', [ReservationController::class, 'update']);

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
