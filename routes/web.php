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

//ROUTES FOR MONITORS - ADMIN
Route::get('/monitors', [MonitorController::class, 'index'])->name('admin.monitors.index');
Route::get('/monitors/create', [MonitorController::class, 'create'])->name('admin.monitors.create');
Route::post('/monitors', [MonitorController::class, 'store'])->name('admin.monitors.store');
Route::get('/monitors/{monitor}/edit', [MonitorController::class, 'edit'])->name('admin.monitors.edit');
Route::put('/monitors/{monitor}', [MonitorController::class, 'update'])->name('admin.monitors.update');
Route::delete('/monitors/{monitor}', [MonitorController::class, 'destroy'])->name('admin.monitors.destroy');

//ROUTES FOR MODELS - ADMIN
Route::get('/models', [ModelController::class, 'index'])->name('admin.models.index');
Route::get('/models/create', [ModelController::class, 'create'])->name('admin.models.create');
Route::post('/models', [ModelController::class, 'store'])->name('admin.models.store');
Route::get('/models/{model}/edit', [ModelController::class, 'edit'])->name('admin.models.edit');
Route::put('/models/{model}', [ModelController::class, 'update'])->name('admin.models.update');
Route::delete('/models/{model}', [ModelController::class, 'destroy'])->name('admin.models.destroy');

//ROUTES FOR INSTRUCTIONS - ADMIN
Route::get('/instructions', [InstructionController::class, 'index'])->name('admin.instructions.index');
Route::get('/instructions/create', [InstructionController::class, 'create'])->name('admin.instructions.create');
Route::post('/instructions', [InstructionController::class, 'store'])->name('admin.instructions.store');
Route::get('/instructions/{instruction}/edit', [InstructionController::class, 'edit'])->name('admin.instructions.edit');
Route::put('/instructions/{instruction}', [InstructionController::class, 'update'])->name('admin.instructions.update');
Route::delete('/instructions/{instruction}', [InstructionController::class, 'destroy'])->name('admin.instructions.destroy');
