<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::resources([
    'requests' => AppointmentController::class
]);

Route::middleware(['auth'])->group(function () {
    Route::get('/afspraken', function () {
        return view(view: 'afspraken');
    }) ;
     Route::get('/webshop', function () {
         return view(view: 'webshop');
     });
 });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
