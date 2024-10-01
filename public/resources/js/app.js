function selectBezorgdienst(bezorgdienst) {
    document.getElementById('result').innerText = `Je hebt ${bezorgdienst} gekozen.`;
}

function calenderbutton(day) {
  document.getElementsByClassName('calenderAppointment')[0].style.display = 'block';
  console.log(day);
}

console.log("js loaded");