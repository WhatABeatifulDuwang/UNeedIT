// Bezorgdiesnten pagina
function selectBezorgdienst(bezorgdienst) {
  document.getElementById('result').innerText = `Je hebt ${bezorgdienst} gekozen. We bezorgen van 10:00 tot 17:30, maandag tot en met vrijdag.`;
  console.log(`${bezorgdienst} is gekozen.`);
}

// Afspraken pagina
document.addEventListener('DOMContentLoaded', function () {
  document.getElementsByClassName('calenderAppointment')[0].style.display = 'none';
});

function calenderbutton(dateString) {
  document.getElementById('selectedDate').textContent = dateString;
  document.getElementsByClassName('calenderAppointment')[0].style.display = 'block';

  // Zet de datum in het juiste formaat in het invoerveld
  const selectedDate = new Date(dateString);
  selectedDate.setDate(selectedDate.getDate() + 1); // Voeg één dag toe

  const formattedDate = selectedDate.toISOString().split('T')[0];
  document.getElementById('appointment_date').value = formattedDate; // Voeg deze regel toe

  console.log(formattedDate);
}

function hideCalendarAppointment() {
  document.getElementsByClassName('calenderAppointment')[0].style.display = 'none';
}

// Faq pagina
function toggleAnswer(id) {
  let answer = document.getElementById('answer' + id);
  answer.classList.toggle('show');
}

// Footer
function openInNewTab(url) {
  window.open(url, '_blank').focus();
}

console.log("js loaded");
