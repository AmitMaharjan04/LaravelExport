<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

Route::get('/', [UserController::class, 'index'])->name('login');
Route::get('/login/github', [UserController::class, 'githubRedirect'])->name('github-redirect');
Route::get('/callback', [UserController::class, 'githubCallback'])->name('github-callback');

Route::middleware(['github-auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('github-auth');
    Route::post('/dashboard', [UserController::class, 'export'])->name('import-json');

    Route::get('/download/{path}',  [UserController::class, 'exportDownload'])->name('download-export');

    Route::get('/logout',[UserController::class, 'logout'])->name('logout');
});
