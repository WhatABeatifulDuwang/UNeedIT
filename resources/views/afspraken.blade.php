<?php
// Verkrijg de huidige maand en jaar uit de queryparameters of gebruik de huidige datum
$currentMonth = isset($_GET['month']) ? (int) $_GET['month'] : date('n');
$currentYear = isset($_GET['year']) ? (int) $_GET['year'] : date('Y');

// Bereken het aantal dagen in de huidige maand
$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

// Bepaal de eerste dag van de maand
$firstDayOfMonth = date('N', strtotime("$currentYear-$currentMonth-01"));
?>

<!-- Gebruikt de layout component en geeft de paginatitel 'Afspraken' door -->
<x-layout title="Afspraken">
    <section class="afspraken-container">
        <section class="calendar">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <section class="month">
                <a href="?month=<?php echo $currentMonth - 1 <= 0 ? 12 : $currentMonth - 1; ?>&year=<?php echo $currentMonth - 1 <= 0 ? $currentYear - 1 : $currentYear; ?>" class="nav">
                    <i class="fas fa-angle-left"><</i>
                </a>
                <section>
                    <?php echo date('F', strtotime("$currentYear-$currentMonth-01")); ?>
                    <span class="year"><?php echo $currentYear; ?></span>
                </section>
                <a href="?month=<?php echo $currentMonth + 1 > 12 ? 1 : $currentMonth + 1; ?>&year=<?php echo $currentMonth + 1 > 12 ? $currentYear + 1 : $currentYear; ?>" class="nav">
                    <i class="fas fa-angle-right">></i>
                </a>
            </section>
            <section class="days">
                <span>Ma</span>
                <span>Di</span>
                <span>Wo</span>
                <span>Do</span>
                <span>Vr</span>
                <span>Za</span>
                <span>Zo</span>
            </section>
            <section class="dates">
                <?php

                for ($i = 1; $i < $firstDayOfMonth; $i++) {
                    echo '<span></span>'; // Lege ruimte voor uitlijning
                }

                // Loop door de dagen van de maand
                for ($d = 1; $d <= $daysInMonth; $d++) {
                    // Maak een geformatteerde datumstring
                    $dateString = date('F j, Y', strtotime("$currentYear-$currentMonth-$d"));

                    // Controleer of de datum de huidige datum is
                    $isToday = $d == date('j') ? 'today' : '';
                    echo "<button class='$isToday' onclick='calenderbutton(\"$dateString\")'><time>$d</time></button>";
                }
                ?>
            </section>
        </section>
        <section class="calenderAppointment">
            <button onclick="hideCalendarAppointment()">X</button>
            <h2>Geselecteerde Datum: <span id="selectedDate"></span></h2>
            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf
                <label for="type">Kies uw apparaat:</label>
                <select name="device_type" id="type" required>
                    <optgroup label="Apparaat Type">
                        <option value="" selected disabled hidden>Kies hier...</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Telefoon">Telefoon</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Desktop">Desktop</option>
                        <option value="Overig">Overig</option>
                    </optgroup>
                </select>
                <input type="text" name="device_name" placeholder="Apparaat naam" required>
                <input type="text" name="description" placeholder="Omschrijving" required>
                <label for="place_of_appointment">Kies uw plaats van afspraak:</label>
                <select name="place_of_appointment" id="type" required>
                    <optgroup label="Plaats in Nederland">
                        <option value="" selected disabled hidden>Kies hier...</option>
                        <option value="Rotterdam">Rotterdam</option>
                        <option value="DenHaag">Den Haag</option>
                        <option value="Amsterdam">Amsterdam</option>
                        <option value="Utrecht">Utrecht</option>
                    </optgroup>
                </select>
                <input type="time" name="appointment_time" placeholder="Tijd" required>
                <input type="date" id="appointment_date" name="appointment_date" required hidden>
                <label for="add_to_google_calendar">
                    <input type="checkbox" id="add_to_google_calendar" name="add_to_google_calendar" value="1">
                    Add to Google Calendar
                </label>
                <input type="submit" value="Afspraak maken">
            </form>
        </section>
    </section>
</x-layout>
