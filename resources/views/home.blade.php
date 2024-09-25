<x-layout title="Home">
    <section class="main-content main-page">
        <section class="homeText">
            <!-- Logo van UNEED-IT -->
            <img src="{{ asset('images/cropped-logo UNEED-IT(notext).png') }}" alt="UNEED-IT Logo" id="container">
            <!-- Welkomsttekst met opmaak -->
            <p><span class="white-text">Voor al uw reparaties kunt u terecht bij </span>
               <span class="red-text">Uneed-</span><span class="blue-text">IT</span></p>
        </section>
    </section>
    <section>
        <h1>Iets komt hier beneden</h1>
        <h1>Iets komt hier beneden</h1>
    </section>

{{--    <div class="container" id="container">--}}
{{--        <div class="square square-1"></div>--}}
{{--        <div class="square square-2"></div>--}}
{{--    </div>--}}


{{--    <script>--}}
{{--        let container = document.getElementById('container');--}}
{{--        let windowHeight = window.innerHeight;--}}
{{--        let windowWidth = window.innerWidth;--}}
{{--        let scrollArea = 1000 - windowHeight;--}}
{{--        let square1 = document.getElementsByClassName('square')[0];--}}
{{--        let square2 = document.getElementsByClassName('square')[1];--}}

{{--        // update position of square 1 and square 2 when scroll event fires.--}}
{{--        window.addEventListener('scroll', function() {--}}
{{--            let scrollTop = window.pageYOffset || window.scrollTop;--}}
{{--            let scrollPercent = scrollTop/scrollArea || 0;--}}

{{--            square1.style.top = scrollPercent*window.innerHeight + 'px';--}}
{{--            // square2.style.left = 800 - scrollPercent*window.innerWidth*0.6 + 'px';--}}
{{--        });--}}
{{--    </script>--}}

</x-layout>
