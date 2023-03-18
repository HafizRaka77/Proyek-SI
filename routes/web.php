<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginIndex'])->name('auth.login.page');
Route::get('/register', [AuthController::class, 'registerIndex'])->name('auth.register.page');
Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');

Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
