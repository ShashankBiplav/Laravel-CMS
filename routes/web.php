<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/post/{post}', [PostController::class, 'show'])->name('post');

Route::middleware('auth')->group(function () {

  Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

  Route::get('/admin/posts',[PostController::class, 'index'])->name('posts.index');

  Route::get('/admin/posts/create',[PostController::class, 'create'])->name('posts.create');

  Route::post('/admin/posts/create',[PostController::class, 'store'])->name('posts.store');

  Route::get('/admin/posts/{post}',[PostController::class,'getPost'])->name('posts.get');

  Route::put('/admin/posts/{post}',[PostController::class, 'update'])->name('posts.update');

  Route::delete('/admin/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');


  Route::get('/admin/{user}/profile',[UserController::class, 'show'])->name('user.profile.show');

  Route::put('/admin/{user}/update',[UserController::class, 'update'])->name('user.profile.update');


  Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');

  Route::delete('/admin/{user}/destroy',[UserController::class, 'destroy'])->name('users.destroy');

});
