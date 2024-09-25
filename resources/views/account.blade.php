<!-- Gebruikt een layout component en geeft de paginatitel 'Account' door -->
<x-layout title="Account">
    <!-- Koptekst van de pagina -->
    <section class="container">
        <section class="error">
        </section>
        <section class="form">
            <h1><span class="red-text">Uneed-</span><span class="blue-text">IT</span>  <span class="white-text">Account</span></h1>
            <form action="{{ url('/accounts/authenticate') }}" method="post">
                @csrf
                <input type="email" id="email" name="email" placeholder="Enter your email">
                <br>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                <br>
                <br>
                <input id="postButton" type="submit" value="Login" name="Submit">
            </form>
            <br>
            <a href="forgot-password.php">I forgot my password</a>
            <section class="bottom">
                <p class="sign-up"> Don't have an account?<br>
                    <br>
                    <a href="{{url('/accounts/create')}}">Sign Up</a></p>
            </section>
            <section id="confirmationMessage"></section>
            <section id="errorTextTag"></section>
        </section>
    </section>
</x-layout>
