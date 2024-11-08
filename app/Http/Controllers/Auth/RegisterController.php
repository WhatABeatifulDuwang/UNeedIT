<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // Alle regels omtrent het valideren van data om een account aan te maken
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'min:2', 'max:20'],
            'last_name' => ['required', 'string', 'min:2', 'max:20'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:accounts,email'],
            'password' => [
                'required',
                'string',
                'min:10',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
                'confirmed',
            ],
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Account
     */
    protected function create(array $data): Account
    {
        return Account::create([
            // De eerste letter van de voornaam en achternaam worden in hoofdletter in de database gezet
            'first_name' => ucfirst($data['first_name']),
            'last_name' => ucfirst($data['last_name']),
            'email' => $data['email'],
            // Het wachtwoord wordt gehashed
            'password' => Hash::make($data['password']),
            'admin' => '0',
        ]);
    }

}
