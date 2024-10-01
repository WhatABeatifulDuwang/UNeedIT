<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Charset instellen voor juiste karaktercodering -->
    <meta charset="UTF-8">

    <!-- Titel van de pagina, dynamisch ingesteld via de $title variabele, default naar 'Untitled' als er geen titel is -->
    <title>{{ $title ?? 'Untitled' }}</title>

    <!-- Laadt de CSS-bestanden, gebundeld en gecompileerd door Vite -->
    @vite('resources/css/app.css')

    <!-- Laadt de JS-bestanden -->
    <script src="resources/js/app.js"></script>

    <!-- Laadt de SCSS-bestanden, gebundeld en gecompileerd door Vite -->
    @vite(['resources/sass/app.scss'])
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
        <section>
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <!-- Lijst met navigatie-items die linken naar verschillende pagina's -->
                <li class="redc"><a href="{{ url('/') }}">Home</a></li>
                <li class="bluec"><a href="{{ url('/overOns') }}">Over ons</a></li>
                <li class="redc"><a href="{{ url('/service') }}">Service</a></li>
                <li class="bluec"><a href="{{ url('/bezorgdiensten') }}">Bezorgdiensten</a></li>
                <li class="redc"><a href="{{ url('/faq') }}">FAQ</a></li>
                <li class="bluec"><a href="{{ url('/contact') }}">Contact</a></li>
                <li class="redc"><a href="{{ url('/afspraken') }}">Afspraken</a></li>
                <li class="bluec"><a href="{{ url('/webshop') }}">Webshop</a></li>
            </ul>
        </section>
        <section>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::User()->first_name }} {{ Auth::User()->last_name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
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
