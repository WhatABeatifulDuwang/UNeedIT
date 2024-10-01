<x-layout title="Home">
    <section class="main-content" id="Uneed-bg">
        <section class="homeText">
            <!-- Logo van UNEED-IT -->
                <img src="{{ asset('images/cropped-logo UNEED-IT(notext).png') }}" alt="UNEED-IT Logo">
            <!-- Welkomsttekst met opmaak -->
            <p><span class="white-text">Voor al uw reparaties kunt u terecht bij </span>
               <span class="red-text">Uneed-</span><span class="blue-text">IT</span></p>
        </section>
    </section>
    <div class="secondary-content">
        <section class="Uneed-Title">
            <h1>Iets komt hier beneden</h1>
            <h1>Iets komt hier ook beneden</h1>
        </section>
    </div>

    <script>
        let container = document.getElementById("Uneed-bg");
        let windowHeight = window.innerHeight;
        let windowWidth = window.innerWidth;
        let scrollArea = 1000 - windowHeight;
        let uNeed = document.getElementsByClassName("homeText")[0];

        // Beweegt de locatie van de achtergrond als er gescrolled wordt.
        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || window.scrollTop;
            let scrollPercent = scrollTop*scrollArea || 0;

            uNeed.style.bottom = scrollPercent/window.innerHeight + 'px';
        });
    </script>

</x-layout>
