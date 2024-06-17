<nav id="navbar">
    <div id="logoNav">
        <a href="{{ url('/')}}"><img src={{asset('images/cropped-logo%20UNEED-IT.png')}} alt="Logo"></a>
    </div>
    <div id="logoOptions">
        <ul>
            <li class="redc"><a href="{{ url('/') }}">Home</a></li>
            <li class="bluec"><a href="{{ url('/overOns') }}">Over ons</a></li>
            <li class="redc"><a href="{{ url('/service') }}">Service</a></li>
            <li class="bluec"><a href="{{ url('/bezorgdiensten') }}">Bezorgdiensten</a></li>
            <li class="redc"><a href="{{ url('/faq') }}">FAQ</a></li>
            <li class="bluec"><a href="{{ url('/contact') }}">Contact</a></li>
            <li class="redc"><a href="{{ url('/account') }}">Account</a></li>
        </ul>
    </div>
</nav>