// Bezorgdiesnten pagina
function selectBezorgdienst(bezorgdienst) {
    document.getElementById('result').innerText = `Je hebt ${bezorgdienst} gekozen.`;
    console.log(`${bezorgdienst} is gekozen.`);
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
  let answer = document.getElementById('answer' + id);
  answer.classList.toggle('show');
}

// Footer
function openInNewTab(url) {
    window.open(url, '_blank').focus();
}

console.log("js loaded");
