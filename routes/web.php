<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function() {

    Route::get('/dashboard', [AdminController::class, 'index']);

    
    Route::get('/menu', [MenuController::class, 'index']);
    Route::get('/table', [TableController::class, 'index']);
    Route::get('/reservation', [ReservationController::class, 'index']);

    // category

    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'create']);

    // menu

    Route::get('/menu', [MenuController::class, 'index']);
    Route::get('/menu/create', [MenuController::class, 'create']);

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
