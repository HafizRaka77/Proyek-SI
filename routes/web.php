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

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product/index', 'index')->name('product.index');
        Route::post('/product', 'store')->name('product.store');
        Route::get('/product/{product:id}', 'show')->name('product.show');
        Route::put('/product/{product:id}/delete', 'delete')->name('product.delete');
        Route::put('/product/{product:id}/update', 'update')->name('product.update');
        Route::get('/products/create', 'create')->name('product.create');
        Route::get('/product/{product:id}/edit', 'edit')->name('product.edit');
    });
});
