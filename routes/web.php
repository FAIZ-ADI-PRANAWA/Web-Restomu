<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Menu Page
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');

// Reservation Page
Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation');

// Reservation Form Submission
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
