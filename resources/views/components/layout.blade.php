<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Untitled' }}</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav id="navbar">
        <div id="logonav">
            <img src="{{ asset('images/cropped-logo%20UNEED-IT.png') }}" alt="Logo">
        </div>
        <div id="logoptions">
            <ul>
                <li class="redc"><a href="{{ url('/home') }}">Home</a></li>
                <li class="bluec"><a href="{{ url('/OverOns') }}">Over ons</a></li>
                <li class="redc"><a href="{{ url('/service') }}">Service</a></li>
                <li class="bluec"><a href="{{ url('/zakelijk') }}">Zakelijk</a></li>
                <li class="redc"><a href="{{ url('/faq') }}">Faq</a></li>
                <li class="bluec"><a href="{{ url('/Bezorgdiensten') }}">Bezorgdiensten</a></li>
                <li class="redc"><a href="{{ url('/account') }}">Account</a></li>
            </ul>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer id="footer">
        <div id="adress">
            <img src="{{ asset('images/location.png') }}" alt="Location Icon">
            <p>ZUIDBAAN 514, 2841MD</p>
            <p>MOORDRECHT</p>
        </div>
        <div id="telefoonnnumer">
            <img src="{{ asset('images/phone.png') }}" alt="Phone Icon">
            <p>+316 30 985 409 SERVICENUMMER</p>
            <p>+3118 28 202 18 KANTOOR</p>
            <p>BEREIKBAAR VAN 09:00-18:00</p>
        </div>
        <div id="tijd">
            <img src="{{ asset('images/clock.png') }}" alt="Clock Icon">
            <p>MA T/M VRIJ, 09:00 - 23:00</p>
            <p>TELEFONISCH BEREIKBAAR</p>
            <p>VOOR ABONNEMENTHOUDERS</p>
        </div>
    </footer>
</body>
</html>
