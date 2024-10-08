import 'bootstrap';

// Home page

let container = document.getElementById('Uneed-bg');
let windowHeight = window.innerHeight;
let scrollArea = 10 - windowHeight;
let Uneedit = document.getElementsByClassName('homeText')[0];

// update position of square 1 and square 2 when scroll event fires.
window.addEventListener('scroll', function() {
    let scrollTop = window.pageYOffset || window.scrollTop;
    let scrollPercent = scrollTop/scrollArea || 0;

    Uneedit.style.top = 8 - scrollPercent*window.innerHeight*0.3 + 'px';
});
