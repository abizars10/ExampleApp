<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RedirectIfAuthenticated;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('auth.register', ['title' => 'Register']);
})
    ->middleware(RedirectIfAuthenticated::class)
    ->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', function () {
    return view('auth.login', ["title" => 'Login']);
})
    ->middleware(RedirectIfAuthenticated::class)
    ->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logut', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard', ['title' => 'Dashboard']);
})
    ->middleware('auth')
    ->name('dashboard');
Route::get('/team', function () {
    return view('team', ['title' => 'Team']);
})
    ->middleware('auth')
    ->name('team');
