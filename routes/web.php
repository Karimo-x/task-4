<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::middleware('guest')->group(function (){
    Route::get('/', [AuthController::class , 'showFormLogin'])->name('login');
    Route::post('/', [AuthController::class , 'login']);
    Route::get('/signup' , [AuthController::class , 'showFormSignUp'])->name('signup');
    Route::post('/signup', [AuthController::class , 'store']);
});

Route::middleware('auth')->group(function (){
    Route::resource('users' , UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts' , PostController::class);
    Route::resource('comments' , CommentController::class);
    Route::resource('tags' , TagController::class);
    Route::post('/logout' , [AuthController::class , 'logout'])->name('logout');
});