<x-layout title="Registreren">
    <body>
    <h1>Maak een account aan</h1>
    <a href="../home.blade.php">Ga terug</a>
    <form action="{{ url('/accounts') }}" method="post">
        @csrf
        <label for="name">Naam</label>
        @error('name') {{ $message }} @enderror
        <input type="text" name="name" id="" value="{{ old('name') }}">
        <label for="email">Email</label>
        @error('email') {{ $message }} @enderror
        <input type="email" name="email" id="" value="{{ old('email') }}">
        <label for="password" name="password"></label>
        @error('password') {{ $message }} @enderror
        <input type="password" name="password" value="{{ old('password') }}">
        <label for="confirm-password" name="confirm-password" id=""></label>
        @error('confirm-password') {{ $message }} @enderror
        <input type="password" name="confirm-password" value="{{ old('confirm-password') }}">
        <input type="submit" value="Maak een nieuw account aan">
    </form>
    </body>
</x-layout>
