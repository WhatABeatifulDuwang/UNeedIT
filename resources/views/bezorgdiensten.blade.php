<x-layout title="Bezorgdiensten">
    <section class="bezorgdiensten-container">
        <section class="bezorgdiensten-text-container">
        <h1 class="textbezorg">Bezorgdiensten</h1>
        <p class="textbezorg"> Als gebruiker wil ik informatie zien over bezorgdiensten zoals UPS, DHL, Homerr, zodat ik kan kiezen voor ophalen en verzenden.</p>
        <p class="textbezorg">Kies een bezorgdienst:</p>
        <ul>
            <li><button class="bezorgdiensten" onclick="selectBezorgdienst('UPS')">UPS</button></li>
            <li><button class="bezorgdiensten" onclick="selectBezorgdienst('DHL')">DHL</button></li>
            <li><button class="bezorgdiensten" onclick="selectBezorgdienst('Homerr')">Homerr</button></li>
    
        </ul>
        <section id="result"></section>
        </section>
    </section>
    <script>
        function selectBezorgdienst(bezorgdienst) {
            document.getElementById('result').innerText = `Je hebt ${bezorgdienst} gekozen.`;
    
        }
    </script>
</x-layout>
