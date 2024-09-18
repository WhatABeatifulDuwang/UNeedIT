<?php

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

Route::get('/accounts', function () {
    return view('account');
});

Route::get('/accounts/create', function (){
    return view('accounts.create');
});

Route::post('/accounts', function (\Illuminate\Http\Request $request) {
    $account = $request->validate([
        'name' => 'required|string|min:5|max:20',
        'email' => 'required|unique:accounts,email|email:rfc,dns',
        'password' => 'required|regex:/^.+@.+$/i|min:10|max:32',
        'confirm-password' => 'required|regex:/^.+@.+$/i|min:10|max:32|same:password',
    ]);

    Account::create($account);
    session_start();

    return redirect('home.blade.php');
});

Route::get('/accounts/{account}', function (Account $account){
    return view('accounts.show', compact('account'));
});

Route::get('/accounts/{account}/edit', function (Account $account){
    return view('accounts.edit', compact('account'));
});

Route::put('/accounts/{account}', function (\Illuminate\Http\Request $request, Account $account){
    $account->update($request->validate([
        'name' => 'required|string|min:5|max:20',
        'email' => 'required|unique:accounts,email|email:rfc,dns',
        'password' => 'required|regex:/^.+@.+$/i|min:10|max:32',
        'confirm-password' => 'required|regex:/^.+@.+$/i|min:10|max:32|same:password',
    ]));

    $account->save();

    return redirect('/accounts');
});

Route::get('/afspraken', function () {
    return view(view: 'afspraken');
});

Route::get('/webshop', function () {
    return view(view: 'webshop');
});