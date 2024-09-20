<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Charset instellen voor juiste karaktercodering -->
    <meta charset="UTF-8">

    <!-- Titel van de pagina, dynamisch ingesteld via de $title variabele, default naar 'Untitled' als er geen titel is -->
    <title>{{ $title ?? 'Untitled' }}</title>

    <!-- Laadt de CSS-bestanden, gebundeld en gecompileerd door Vite -->
    @vite('resources/css/app.css')

    <!-- Laadt de JS-bestanden, gebundeld en gecompileerd door Vite -->
    @vite('resources/js/app.js')
</head>
<body>
    <!-- Navigatiebalk -->
    <nav id="navbar">
        <!-- Logo sectie in de navigatie -->
        <section id="logoNav">
            <!-- Link naar de homepagina, met een logo afbeelding -->
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/cropped-logo%20UNEED-IT.png') }}" alt="Logo">
            </a>
        </section>

        <!-- Navigatie-opties -->
        <section id="logoOptions">
            <ul>
                <!-- Lijst met navigatie-items die linken naar verschillende pagina's -->
                <li class="redc"><a href="{{ url('/') }}">Home</a></li>
                <li class="bluec"><a href="{{ url('/overOns') }}">Over ons</a></li>
                <li class="redc"><a href="{{ url('/service') }}">Service</a></li>
                <li class="bluec"><a href="{{ url('/bezorgdiensten') }}">Bezorgdiensten</a></li>
                <li class="redc"><a href="{{ url('/faq') }}">FAQ</a></li>
                <li class="bluec"><a href="{{ url('/contact') }}">Contact</a></li>
                <li class="redc"><a href="{{ url('/accounts') }}">Account</a></li>
                <li class="bluec"><a href="{{ url('/afspraken') }}">Afspraken</a></li>
                <li class="redc"><a href="{{ url('/webshop') }}">Webshop</a></li>
            </ul>
        </section>
    </nav>

    <!-- Hoofdinhoud van de pagina, dynamisch ingevoegd via de $slot variabele -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer sectie -->
    <footer id="footer">
        <!-- Adressectie met locatie-icoon -->
        <section id="address">
            <img src="{{ asset('images/location.png') }}" alt="Location Icon">
            <p>Zuidbaan 514, 2841MD</p>
            <p>Moordrecht</p>
        </section>

        <!-- Telefoonnummersectie met telefoonicoon -->
        <section id="phoneNumber">
            <img src="{{ asset('images/phone.png') }}" alt="Phone Icon">
            <p>
                Servicenummer:
                <a href="tel:+31630985409">+316-30-985-409</a>
            </p>
            <p>
                Kantoornummer:
                <a href="tel:+31182820218">+3118-28-202-18</a>
            </p>
            <p>Bereikbaar van 09:00-18:00</p>
        </section>

        <!-- Tijden en bereikbaarheidssectie met klokicoon -->
        <section id="timeLabel">
            <img src="{{ asset('images/clock.png') }}" alt="Clock Icon">
            <p>Ma t/m Vrij, 09:00 - 23:00</p>
            <p>Telefonisch bereikbaar</p>
            <p>voor abonnementhouders</p>
        </section>
    </footer>
</body>
</html>
