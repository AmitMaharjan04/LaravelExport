<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

Route::get('/', [UserController::class, 'index']);
Route::get('/login/github', [UserController::class, 'githubRedirect'])->name('github-redirect');
Route::get('/callback', [UserController::class, 'githubCallback'])->name('github-callback');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('github-auth');

Route::post('/dashboard', [UserController::class, 'export'])->name('import-json');