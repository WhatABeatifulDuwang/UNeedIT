<x-layout title="Registreren">
    <body>
    <h1>Maak een account aan</h1>
    <a href="{{url('/accounts')}}">Ga terug</a>
    <form action="{{ url('/accounts') }}" method="post">
        @csrf
        <label for="first_name">Voornaam</label>
        @error('first_name') {{ $message }} @enderror
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">

        <label for="last_name">Achternaam</label>
        @error('last_name') {{ $message }} @enderror
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">

        <label for="email">Email</label>
        @error('email') {{ $message }} @enderror
        <input type="email" name="email" id="email" value="{{ old('email') }}">

        <label for="password">Password</label>
        @error('password') {{ $message }} @enderror
        <input type="password" name="password" id="password" value="{{ old('password') }}">

        <label for="confirm_password">Confirm password</label>
        @error('confirm_password') {{ $message }} @enderror
        <input type="password" name="confirm_password" id="confirm_password" value="{{ old('confirm_password') }}">

        <label for="street_name">Straatnaam</label>
        @error('street_name') {{ $message }} @enderror
        <input type="text" name="street_name" id="street_name" value="{{ old('street_name') }}">

        <label for="street_number">Straatnummer</label>
        @error('street_number') {{ $message }} @enderror
        <input type="number" name="street_number" id="street_number" value="{{ old('street_number') }}">

        <label for="street_additional">Toevoeging</label>
        @error('street_additional') {{ $message }} @enderror
        <input type="text" name="street_additional" id="street_additional" value="{{ old('street_additional') }}">

        <label for="city">Stad</label>
        @error('city') {{ $message }} @enderror
        <input type="text" name="city" id="city" value="{{ old('city') }}">

        <label for="country">Land</label>
        @error('country') {{ $message }} @enderror
        <input type="text" name="country" id="country" value="{{ old('country') }}">

        <label for="postal_code">Postcode</label>
        @error('postal_code') {{ $message }} @enderror
        <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code') }}">

        <input type="submit" value="Maak een nieuw account aan">
    </form>
    </body>
</x-layout>
