<!-- Gebruikt de layout component en geeft de paginatitel 'Afspraken' door -->
<x-layout title="Afspraken">
  <section class="afspraken-container">
    <section class="calendar">
      <section class="month">
        <a href="#" class="nav">
          <i class="fas fa-angle-left"></i>
        </a>
        <section>
          <?php echo date('M') ?>
          <span class="year"><?php echo date("Y") ?></span>
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
        <!-- for loop om de datums aan te maken -->
        <?php
        for ($d = 1; $d <= date("t"); $d++) {
          echo "<button onclick='calanderbutton($d)'><time>$d</time></button>";
        }
        ?>
        <script>
          function calanderbutton(day) {
            document.getElementsByClassName('calanderAppointment')[0].style.display = 'block';
            console.log(day);
          }
        </script>
      </section>
    </section>
    <section class="calanderAppointment">
      <form>
        <input placeholder="Device type"></input>
        <input placeholder="Description"></input>
        <input type="submit" value="Submit">
      </form>
    </section>   
  </section>
</x-layout>
