<?php

use App\Http\Controllers\PdvController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PdvController::class, 'index'])->name('pdvs.index');
Route::get('/pdvs/create', [PdvController::class, 'create'])->name('pdvs.create');
Route::post('/pdvs', [PdvController::class, 'store'])->name('pdvs.store');