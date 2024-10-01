import './bootstrap';
 
function selectBezorgdienst(bezorgdienst) {
    document.getElementById('result').innerText = `Je hebt ${bezorgdienst} gekozen.`;
}

function calanderbutton(day) {
  document.getElementsByClassName('calanderAppointment')[0].style.display = 'block';
  console.log(day);
}

console.log("js loaded");