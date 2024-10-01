<x-layout title="Registreren">
    <body>
        
   
    <a href="{{url('/accounts')}}">Ga terug</a>
    <form class="registeren-page"  action="{{ url('/accounts') }}" method="post">
        
        <h1>Maak een account aan</h1>
        
        @csrf
        <label for="first_name">*Voornaam</label>
        @error('first_name') {{ $message }} @enderror
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">
        <br>

        <label for="last_name">*Achternaam</label>
        @error('last_name') {{ $message }} @enderror
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">
        <br>

        <label for="email">*Email</label>
        @error('email') {{ $message }} @enderror
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        <br>

        <label for="password">*Wachtwoord</label>
        @error('password') {{ $message }} @enderror
        <input type="password" name="password" id="password" value="{{ old('password') }}">
        <br>

        <label for="confirm_password">*Bevestig Wachtwoord</label>
        @error('confirm_password') {{ $message }} @enderror
        <input type="password" name="confirm_password" id="confirm_password" value="{{ old('confirm_password') }}">
        <br>

        <label for="street_name">*Straatnaam</label>
        @error('street_name') {{ $message }} @enderror
        <input type="text" name="street_name" id="street_name" value="{{ old('street_name') }}">
        <br>

        <label for="street_number">*Straatnummer</label>
        @error('street_number') {{ $message }} @enderror
        <input type="number" name="street_number" id="street_number" value="{{ old('street_number') }}">
        <br>

        <label for="street_additional">Toevoeging</label>
        @error('street_additional') {{ $message }} @enderror
        <input type="text" name="street_additional" id="street_additional" value="{{ old('street_additional') }}">
        <br>

        <label for="city">*Stad</label>
        @error('city') {{ $message }} @enderror
        <input type="text" name="city" id="city" value="{{ old('city') }}">
        <br>

        <label for="country">*Land</label>
        @error('country') {{ $message }} @enderror
        <input type="text" name="country" id="country" value="{{ old('country') }}">
        <br>

        <label for="postal_code">*Postcode</label>
        @error('postal_code') {{ $message }} @enderror
        <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code') }}">
        <br>

        <input type="submit" value="Maak een nieuw account aan">
    </form>
    </body>
</x-layout>
