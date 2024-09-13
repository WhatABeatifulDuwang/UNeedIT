<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Untitled' }}</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav id="navbar">
        <section id="logoNav">
            <a href="{{ url('/')}}"><img src={{asset('images/cropped-logo%20UNEED-IT.png')}} alt="Logo"></a>
        </section>
        <section id="logoOptions">
            <ul>
                <li class="redc"><a href="{{ url('/') }}">Home</a></li>
                <li class="bluec"><a href="{{ url('/overOns') }}">Over ons</a></li>
                <li class="redc"><a href="{{ url('/service') }}">Service</a></li>
                <li class="bluec"><a href="{{ url('/bezorgdiensten') }}">Bezorgdiensten</a></li>
                <li class="redc"><a href="{{ url('/faq') }}">FAQ</a></li>
                <li class="bluec"><a href="{{ url('/contact') }}">Contact</a></li>
                <li class="redc"><a href="{{ url('/account') }}">Account</a></li>
                <li class="bluec"><a href="{{ url('/afspraken') }}">Afspraken</a></li>
            </ul>
        </section>
    </nav>
    
    <main>
        {{ $slot }}
    </main>

    <footer id="footer">
        <section id="address">
            <img src="{{ asset('images/location.png') }}" alt="Location Icon">
            <p>Zuidbaan 514, 2841MD</p>
            <p>Moordrecht</p>
        </section>
        <section id="phoneNumber">
            <img src="{{ asset('images/phone.png') }}" alt="Phone Icon">
            <p>
                Servicenummer:
                <a href="tel:+31630985409">+316-30-985-409</a>
            </p>
            <p>
                Kantoor:
                <a href="tel:+31182820218">+3118-28-202-18</a>
            </p>
            <p>Bereikbaar van 09:00-18:00</p>
        </section>
        <section id="timeLabel">
            <img src="{{ asset('images/clock.png') }}" alt="Clock Icon">
            <p>Ma t/m Vrij, 09:00 - 23:00</p>
            <p>Telefonisch bereikbaar</p>
            <p>voor abonnementhouders</p>
        </section>
    </footer>
</body>
</html>
