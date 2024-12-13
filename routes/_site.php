<?php

use App\Http\Controllers\_SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [_SiteController::class, 'index'])->name('index');

Route::get('/dashboard', [_SiteController::class, 'dashboard'])->name('dashboard');

/*  */
