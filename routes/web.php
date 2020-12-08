<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/post/{post}', [PostController::class, 'show'])->name('post');

Route::middleware('auth')->group(function () {

  Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

  Route::get('/admin/posts/create',[PostController::class, 'create'])->name('post.create');

  Route::post('/admin/posts/create',[PostController::class, 'store'])->name('post.store');

});
