<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClubController;
use App\Http\Middleware\RedirectIfAuthenticated;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(RedirectIfAuthenticated::class)->group(function (){
    Route::get('register', function(){
        return view('auth.register', ['title' => 'register']);
    })->name('register');
    Route::get('login', function(){
        return view('auth.login', ['title' => 'login']);
    })->name('login');
});

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logut', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function (){
    Route::get('dashboard', function(){return view('dashboard', ['title' => 'Dashboard']);})->name('dashboard');
    Route::get('team', function(){return view('team', ['title' => 'Team']);})->name('team');
    Route::get('club', [ClubController::class, 'index'])->name('club.index');
    Route::get('/clubs/create', [ClubController::class, 'create'])->name('club.create');
    Route::post('/clubs/create', [ClubController::class, 'store'])->name('club.store');
    Route::get('/clubs/edit{id}', [ClubController::class, 'edit'])->name('club.edit');
    Route::put('/clubs/update{id}', [ClubController::class, 'update'])->name('club.update');
});