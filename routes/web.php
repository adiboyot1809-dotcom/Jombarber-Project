<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;

// Guest Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Authenticated Main Web Application Gates
Route::middleware('auth')->group(function () {
    Route::get('/home', [BookingController::class, 'index'])->name('home');
    
    // Appointment Engine Sub-routes
    Route::get('/booking', [BookingController::class, 'showBookingForm'])->name('booking.form');
    Route::post('/booking', [BookingController::class, 'storeAppointment'])->name('booking.store');
    Route::get('/payment/{id}', [BookingController::class, 'paymentPage'])->name('payment.page');
    Route::get('/my-appointments', [BookingController::class, 'myAppointments'])->name('appointments.my');
    Route::post('/appointment/{id}/cancel', [BookingController::class, 'cancelAppointment'])->name('appointment.cancel');
    
    // Browsing and Feedback Review features
    Route::get('/browse', [BookingController::class, 'browseBarbers'])->name('barbers.browse');
    Route::get('/rate', [BookingController::class, 'showReviewForm'])->name('rate.form');
    Route::post('/rate', [BookingController::class, 'storeReview'])->name('rate.store');
    
    // System Exit
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});