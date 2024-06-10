<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/contacts', [DashboardController::class, 'contacts'])->name('contacts');
    Route::get('/about', [DashboardController::class, 'about'])->name('about');

    Route::get('/subjects/{id}', [BookController::class, 'index'])->name('books.index');
});
