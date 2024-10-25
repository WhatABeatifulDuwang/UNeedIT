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
        </section>
    </section>
</x-layout>

<script>
    let container = document.getElementById('Uneed-bg');
    let windowHeight = window.innerHeight;
    let scrollArea = 15 - windowHeight;
    let Uneedit = document.getElementsByClassName('homeText')[0];

    // update position of square 1 and square 2 when scroll event fires.
    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || window.scrollTop;
        let scrollPercent = scrollTop/scrollArea || -1;

        Uneedit.style.top = 8 - scrollPercent*window.innerHeight*0.325 + 'px';
    });
</script>
