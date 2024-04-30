const carousel = document.querySelector('.carousel');
const slides = carousel.querySelectorAll('.slide');
const prev = carousel.querySelector('.prev');
const next = carousel.querySelector('.next');

let currentSlide = 0;

function showSlide(n) {
  slides.forEach((slide, i) => {
    slide.style.opacity = i === n ? 1 : 0;
  });
  currentSlide = n;
}

function nextSlide() {
  showSlide((currentSlide + 1) % slides.length);
}

function prevSlide() {
  showSlide(currentSlide === 0 ? slides.length - 1 : currentSlide - 1);
}

showSlide(currentSlide);

prev.addEventListener('click', prevSlide);
next.addEventListener('click', nextSlide);