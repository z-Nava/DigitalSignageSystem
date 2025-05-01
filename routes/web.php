<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\LineController;
use App\Http\Controllers\Admin\MonitorController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\Admin\InstructionController;


Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/admin/dashboard', [HomeController::class, 'dashAdmin'])->name('admin.dashboard');
Route::get('/client/dashboard', [HomeController::class, 'dashClient'])->name('client.dashboard');
Route::get('/lines', [LineController::class, 'index'])->name('admin.lines.index');
Route::get('/monitors', [MonitorController::class, 'index'])->name('admin.monitors.index');
Route::get('/models', [ModelController::class, 'index'])->name('admin.models.index');
Route::get('/instructions', [InstructionController::class, 'index'])->name('admin.instructions.index');

