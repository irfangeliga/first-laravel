<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\Administrator;
use App\Http\Middleware\Authentification;
use App\Http\Middleware\Guest;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->middleware(Guest::class)->name('login');
    Route::get('/register', 'register');
    Route::post('/register', 'signUp');
    Route::post('/login', 'signIn');
    Route::post('/logout', 'logOut');
});

Route::middleware(Authentification::class)->group(function () {});
Route::get('/blog-category/{id}', [PostController::class, 'category']);
Route::get('/blog-writer/{id:username}', [PostController::class, 'penulis']);
Route::get('/blog-artikel/{id}', [PostController::class, 'artikel']);

Route::middleware(Administrator::class)->group(function () {
    Route::get('/blog', [PostController::class, 'index']);
    Route::get('/artikel-update/{id}', [PostController::class, 'edit']);
    Route::post('/artikel-update', [PostController::class, 'update']);
    Route::get('/artikel-delete/{id}', [PostController::class, 'destroy']);
    Route::post('/blog-store', [PostController::class, 'store']);
    Route::get('/dashboard', [PostController::class, 'dashboard']);
});


Route::get('/{name}', function ($name) {
    return view($name, [
        "name" => $name,
        "title" => $name
    ]);
});

Route::get('/admin/{name}', function ($name) {
    return view("/admin/" . $name, [
        "name" => $name,
        "title" => $name
    ]);
});
