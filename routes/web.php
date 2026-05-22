<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {return view('auth.login');});
Route::post('/register', [RegisterController::class,'registered'])->name('verification.verify');
Auth::routes();

Route::middleware(['auth'])->group(function () { 
    Route::get('/tiket/download-pdf', [LaporanController::class, 'tiketReport'])->name('tiket.pdf');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/tiket', [TiketController::class, 'index'])->name('tiket');
    Route::get('/tiket/create', [TiketController::class, 'create'])->name('tiket.create');
    Route::post('/tiket/store', [TiketController::class, 'store'])->name('tiket.store');
    Route::get('/tiket/{id}', [TiketController::class, 'edit'])->name('tiket.edit');
    Route::put('/tiket/{id}', [TiketController::class, 'update'])->name('tiket.update');
    Route::delete('/tiket/{id}', [TiketController::class, 'delete'])->name('tiket.destroy');

    Route::get('report', [LaporanController::class,'index'])->name('report');

    Route::get('/event', [EventController::class, 'index'])->name('event');
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/{id}', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/event/{id}', [EventController::class, 'update'])->name('event.update');
    Route::delete('/event/{id}', [EventController::class, 'delete'])->name('event.destroy');
});