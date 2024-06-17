<x-layout title="Bezorgdiensten">
    <div class="bezorgdiensten-container">
        <div class="bezorgdiensten-text-container">
        <h1 class="textbezorg">Bezorgdiensten</h1>
        <p class="textbezorg"> Als gebruiker wil ik informatie zien over bezorgdiensten zoals UPS, DHL, Homerr, zodat ik kan kiezen voor ophalen en verzenden.</p>
        <p class="textbezorg">Kies een bezorgdienst:</p>
        <ul>
            <li><button class="bezorgdiensten" onclick="selectBezorgdienst('UPS')">UPS</button></li>
            <li><button class="bezorgdiensten" onclick="selectBezorgdienst('DHL')">DHL</button></li>
            <li><button class="bezorgdiensten" onclick="selectBezorgdienst('Homerr')">Homerr</button></li>
    
        </ul>
        <div id="result"></div>
        </div>
    </div>
    <script>
        function selectBezorgdienst(bezorgdienst) {
            document.getElementById('result').innerText = `Je hebt ${bezorgdienst} gekozen.`;
    
        }
    </script>
</x-layout>
