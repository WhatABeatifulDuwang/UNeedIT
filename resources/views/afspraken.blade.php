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
        <span>Mon</span>
        <span>Tue</span>
        <span>Wed</span>
        <span>Thu</span>
        <span>Fri</span>
        <span>Sat</span>
        <span>Sun</span>
      </section>
      <section class="dates">
        <?php
        // Get the current month and year
        $currentMonth = date("n"); // Numeric representation of a month, without leading zeros
        $currentYear = date("Y"); // Current year
        $daysInMonth = date("t"); // Total number of days in the month

        // Get the first day of the month (1 = Monday, 7 = Sunday)
        $firstDayOfMonth = date("N", strtotime("$currentYear-$currentMonth-01")); 

        // Create empty spans for days before the first of the month
        for ($i = 1; $i < $firstDayOfMonth; $i++) {
          echo "<span></span>"; // Empty space for alignment
        }

        // Loop through the days of the month
        for ($d = 1; $d <= $daysInMonth; $d++) {
          // Create a formatted date string
          $dateString = date("F j, Y", strtotime("$currentYear-$currentMonth-$d")); // Format: "Month Day, Year"
          
          // Check if the date matches the current date
          $isToday = ($d == date("j")) ? 'today' : '';
          echo "<button class='$isToday' onclick='calenderbutton(\"$dateString\")'><time>$d</time></button>";
        }
        ?>
      </section>
    </section>
    <section class="calenderAppointment">
      <h2>Selected Date: <span id="selectedDate"></span></h2> <!-- Spot to show the clicked date -->
      <form>
        <input placeholder="Device type"></input>
        <input placeholder="Description"></input>
        <input type="submit" value="Submit">
      </form>
      <button onclick="hideCalendarAppointment()">Hide</button> <!-- Hide button -->
    </section>
  </section>
</x-layout>
