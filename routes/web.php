<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/admin/dashboard', [HomeController::class, 'dashAdmin'])->name('admin.dashboard');
Route::get('/client/dashboard', [HomeController::class, 'dashClient'])->name('client.dashboard');
