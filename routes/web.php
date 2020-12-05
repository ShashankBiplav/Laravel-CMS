<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin',[AdminController::class, 'index'])->name('admin.index');

Route::get('/post', [PostController::class, 'show'])->name('blog.post');
