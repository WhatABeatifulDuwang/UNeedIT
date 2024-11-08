<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Routes voor alle HTTP requests
Route::get('/', function () {
    return view('home');
});

Route::get('/overOns', function () {
    return view('overOns');
});

Route::get('/service', function () {
    return view('service');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/bezorgdiensten', function () {
    return view('bezorgdiensten');
});

// Route naar de resource controller afspraken
Route::resource('appointments', AppointmentController::class);

// Specifieke routes voor authenticated accounts
Route::middleware(['auth'])->group(function () {
    Route::get('/afspraken', function () {
        return view('afspraken');
    });
    Route::get('/webshop', function () {
        return view('webshop');
    });
});

// Route voor alles omtrent de authenticatie van de applicatie
Auth::routes();

// Route voor de HomeController
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes voor de Google Calendar API
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('google/redirect', [AppointmentController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('google/callback', [AppointmentController::class, 'handleGoogleCallback'])->name('google.callback');
