<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;

Route::get('/', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/sync', [BeritaController::class, 'sync'])->name('berita.sync');
Route::post('/berita/truncate', [BeritaController::class, 'truncate'])->name('berita.truncate');
