<!-- Gebruikt de layout component en geeft de paginatitel 'Afspraken' door -->
<x-layout title="Afspraken">
  <section class="afspraken-container">
    <section class="calendar">
      <section class="month">
        <a href="#" class="nav">
          <i class="fas fa-angle-left"></i>
        </a>
        <section>
          <?php echo date('F'); ?>
          <span class="year"><?php echo date("Y"); ?></span>
        </section>
        <a href="#" class="nav">
          <i class="fas fa-angle-right"></i>
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
        // Get the current month and year
        $currentMonth = date("n");
        $currentYear = date("Y");
        $daysInMonth = date("t");

        $firstDayOfMonth = date("N", strtotime("$currentYear-$currentMonth-01"));

        for ($i = 1; $i < $firstDayOfMonth; $i++) {
          echo "<span></span>"; // Empty space for alignment
        }

        // Loop through the days of the month
        for ($d = 1; $d <= $daysInMonth; $d++) {
          // Create a formatted date string
          $dateString = date("F j, Y", strtotime("$currentYear-$currentMonth-$d"));

          // Check if the date matches the current date
          $isToday = ($d == date("j")) ? 'today' : '';
          echo "<button class='$isToday' onclick='calenderbutton(\"$dateString\")'><time>$d</time></button>";
        }
        ?>
      </section>
    </section>
    <section class="calenderAppointment">
        <button onclick="hideCalendarAppointment()">X</button>
      <h2>Geselecteerde Datum: <span id="selectedDate"></span></h2>
      <form>
        Kies uw apparaat:
        <select name="Apparaat Type" id="type">
        <optgroup label="Apparaat Type">
            <option value="" selected disabled hidden>Kies hier...</option>
                <option value="Laptop">Laptop</option>
                <option value="Telefoon">Telefoon</option>
                <option value="Tablet">Tablet</option>
                <option value="Desktop">Desktop</option>
                <option value="Overig">Overig</option>
        <input placeholder="Apparaat naam"></input>
        <input placeholder="Omschrijving"></input>
        <input placeholder="Tijd"></input>

        <input type="submit" value="Afspraak maken">
      </form>
    </section>
  </section>
</x-layout>
