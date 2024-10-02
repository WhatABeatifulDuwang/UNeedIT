// Bezorgdiesnten pagina
function selectBezorgdienst(bezorgdienst) {
    document.getElementById('result').innerText = `Je hebt ${bezorgdienst} gekozen.`;
}

// Afspraken pagina
function calenderbutton(dateString) {
  document.getElementById('selectedDate').textContent = dateString;
  document.getElementsByClassName('calenderAppointment')[0].style.display = 'block';
  console.log(dateString);
}

function hideCalendarAppointment() {
  document.getElementsByClassName('calenderAppointment')[0].style.display = 'none';
}

// Faq pagina
function toggleAnswer(id) {
  var answer = document.getElementById('answer' + id);
  answer.classList.toggle('show');
}

console.log("js loaded");