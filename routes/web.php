<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'login']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'post'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function(){

    Route::group(['prefix' => 'product', 'as' => 'product.'], function(){
        Route::get('/' , [ProductController::class, 'index'])->name('index');
        Route::get('/create' , [ProductController::class, 'create'])->name('create');
        Route::post('/create' , [ProductController::class, 'store'])->name('store');
        Route::get('/buy/{id}' , [ProductController::class, 'buy'])->name('buy');
        Route::get('/delete/{id}' , [ProductController::class, 'delete'])->name('delete');
        Route::get('/my' , [ProductController::class, 'my'])->name('my');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function(){
        Route::get('/' , [ProfileController::class, 'index'])->name('index');
        Route::get('/purchase' , [ProfileController::class, 'purchase'])->name('purchase');
    });
});
