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

//ROUTES FOR LINES - ADMIN
Route::get('/lines', [LineController::class, 'index'])->name('admin.lines.index');
Route::get('/lines/create', [LineController::class, 'create'])->name('admin.lines.create');
Route::post('/lines', [LineController::class, 'store'])->name('admin.lines.store');
Route::get('/lines/{line}/edit', [LineController::class, 'edit'])->name('admin.lines.edit');
Route::put('/lines/{line}', [LineController::class, 'update'])->name('admin.lines.update');
Route::delete('/lines/{line}', [LineController::class, 'destroy'])->name('admin.lines.destroy');


Route::get('/monitors', [MonitorController::class, 'index'])->name('admin.monitors.index');
Route::get('/models', [ModelController::class, 'index'])->name('admin.models.index');
Route::get('/instructions', [InstructionController::class, 'index'])->name('admin.instructions.index');

