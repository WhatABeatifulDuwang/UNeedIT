<x-layout title="Home">
    <section class="main-content" id="Uneed-bg">
        <section class="homeText">
            <!-- Logo van UNEED-IT -->
                <img src="{{ asset('images/cropped-logo UNEED-IT(notext).png') }}" alt="UNEED-IT Logo">
            <!-- Welkomsttekst met opmaak -->
            <p><span class="white-text">Voor al uw reparaties kunt u terecht bij </span>
               <span class="red-text">Uneed</span><spam class="white-text">-</spam><span class="blue-text">IT</span></p>
        </section>
    </section>
    <section class="secondary-content">
        <section class="Uneed-Title">
            <h1>Welkom bij Uneed-IT!</h1>
            <hr class="lineRed">
            <section class="secondary-info">
                <p>Jouw partner voor slimme, betrouwbare en gebruiksvriendelijke IT-oplossingen. Onze werkzaamheden bestaan uit professionele reparateurs. Ons team zorgt ervoor dat jouw IT apparaten naadloos aangesloten en met behoeften gerapareert worden.</p>
            </section>
            <br>
            <hr class="lineBlue">
            <section class="secondary-info">
                <h3 class="">Meer informatie kunt u in onze
                    <a href="{{ url('/overOns') }}">Over ons</a> of
                    <a href="{{ url('/service') }}">Service</a> pagina's vinden.
                </h3>
            </section>
            <br>
            <hr class="lineGold">
        </section>
    </section>
</x-layout>
