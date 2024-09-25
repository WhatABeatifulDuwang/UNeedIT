<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Validator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $accounts = Account::all();

        return view('account');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'first_name' => 'required|string|min:2|max:20',
            'last_name' => 'required|string|min:2|max:20',
            'email' => 'required|unique:accounts,email|email:rfc,dns',
            'password' => [
                'required',
                'string',
                'min:10',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
            'confirm_password' => [
                'required',
                'string',
                'same:password',
            ],
            'street_name' => 'required|string|min:5|max:30',
            'street_number' => 'required|integer|min:1|max:9999',
            'street_additional' => 'nullable|string|min:1|max:5',
            'city' => 'required|string|min:5|max:20',
            'country' => 'required|string|min:5|max:20',
            'postal_code' => 'required|string|min:1|max:6',
        ]);

        $account = new Account([
            'id' => Auth::id(),
            'first_name' => $credentials['first_name'],
            'last_name' => $credentials['last_name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
            'street_name' => $credentials['street_name'],
            'street_number' => $credentials['street_number'],
            'street_additional' => $credentials['street_additional'] ?? null,
            'city' => $credentials['city'],
            'country' => $credentials['country'],
            'postal_code' => $credentials['postal_code'],
            'admin' => '0',
        ]);

        $account->save();

        // Use Laravel session management
        session()->flash('status', 'Account created successfully!');

        return redirect('/accounts');
    }


    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id): View
    {
        return view('accounts/{account}', [
            'account' => Account::findOrFail($id)->id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id): View
    {
        return view('/accounts/{account}/edit', [
            'account' => Account::findOrFail($id)->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $account = Account::findOrFail($id);
        $account->update($request->validate([
            'street_name' => 'string|min:5|max:30',
            'street_number' => 'integer|min:1|max:9999',
            'street_additional' => 'nullable|string|min:1|max:5',
            'city' => 'string|min:5|max:20',
            'country' => 'string|min:5|max:20',
            'postal_code' => 'string|min:1|max:6',
        ]));

        $account->save();

        return redirect('/accounts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password']
        ])) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
