<!-- Gebruikt de layout component en geeft de paginatitel 'Afspraken' door -->
<x-layout title="Afspraken">
  <section class="afspraken-container">
    <div class="calendar">
        <div class="month"><a href="#" class="nav"><i class="fas fa-angle-left"></i></a><div><?php echo (new \DateTime())->format('M') ?> <span class="year"><?php echo (new \DateTime())->format('Y') ?></span></div><a href="#" class="nav"><i class="fas fa-angle-right"></i></a></div>
        <div class="days">
          <span>Mon</span>
          <span>Tue</span>
          <span>Wed</span>
          <span>Thu</span>
          <span>Fri</span>
          <span>Sat</span>
          <span>Sun</span>
        </div>
        <div class="dates">
          <!-- for loop om de datums aan te maken -->
          <?php
          for ($d = 1; $d <= date("t"); $d++) {
            echo "<button><time>$d</time></button>";
          }
          ?>
        </div>
      </div>
  </section>
</x-layout>
