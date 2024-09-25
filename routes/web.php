<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\RequestController;
use App\Models\Account;
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
    'accounts' => AccountController::class,
    'requests' => RequestController::class
]);

Route::post('accounts/authenticate', [AccountController::class, 'authenticate'])->withoutMiddleware('auth');

Route::get('/afspraken', function () {
    return view(view: 'afspraken');
});

Route::get('/webshop', function () {
    return view(view: 'webshop');
});