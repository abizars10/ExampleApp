<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectIfAuthenticated;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/landing', function () {
    return view('layouts.app');
});

Route::get('/register', function () {
    return view('auth.register');
})
    ->middleware(RedirectIfAuthenticated::class)
    ->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', function () {
    return view('auth.login');
})
    ->middleware(RedirectIfAuthenticated::class)
    ->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logut', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware('auth')
    ->name('dashboard');
