<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('guest')->group(function () {
    Route::get('auth', [AuthenticationController::class, 'login'])->name('login');
    Route::post('auth', [AuthenticationController::class, 'doLogin'])->name('do_login');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::prefix('module')->group(function () {
        Route::prefix('task')->group(function () {
            Route::get('/', [TaskController::class, 'index'])->name('task.index');
            Route::get('create', [TaskController::class, 'create'])->name('task.create');
            Route::post('store', [TaskController::class, 'store'])->name('task.store');
            Route::get('show/{id}', [TaskController::class, 'show'])->name('task.show');
        });
    });
});
