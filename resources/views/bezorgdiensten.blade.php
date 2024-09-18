<x-layout title="Bezorgdiensten">
    <section class="bezorgdiensten-container">
        <section class="bezorgdiensten-text-container">
            <section class="Uneed-Title">
                <h1>
                    <span class="cred">BEZORGDIENSTEN</span>
                </h1>
            </section>
            <hr class="line">
            <p class="textbezorg">Als gebruiker wil ik informatie zien over bezorgdiensten zoals UPS, DHL, Homerr, zodat ik kan kiezen voor ophalen en verzenden.</p>
            <p class="textbezorg">Kies een bezorgdienst:</p>
            <ul class="bezordienstenlc">
                <!-- Knoppen voor het selecteren van een bezorgdienst -->
                <li><button class="bezorgdiensten" onclick="selectBezorgdienst('UPS')">UPS</button></li>
                <li><button class="bezorgdiensten" onclick="selectBezorgdienst('DHL')">DHL</button></li>
                <li><button class="bezorgdiensten" onclick="selectBezorgdienst('Homerr')">Homerr</button></li>
            </ul>
            <!-- Sectie waar de gekozen bezorgdienst wordt getoond -->
            <section id="result"></section>
        </section>
    </section>

    <!-- Script dat de keuze van de gebruiker weergeeft -->
    <script>
        function selectBezorgdienst(bezorgdienst) {
            document.getElementById('result').innerText = `Je hebt ${bezorgdienst} gekozen.`;
        }
    </script>

</x-layout>
