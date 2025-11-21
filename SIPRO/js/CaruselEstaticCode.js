let slideIndex = 0;

function moveSlide(n) {
  const slides = document.querySelectorAll('.slideEs');
  const numSlides = slides.length;
  
  slideIndex += n;
  
  if (slideIndex >= numSlides) {
    slideIndex = 0;
  } else if (slideIndex < 0) {
    slideIndex = numSlides - 1;
  }
  
  const offset = -slideIndex * 100;
  document.querySelector('.carouselEs-inner').style.transform = `translateX(${offset}%)`;
}

//Segundo Carusel

let slideIndex2 = 0;

function moveSlide2(n) {
  const slides = document.querySelectorAll('.slideEs2');
  const numSlides = slides.length;
  
  slideIndex2 += n;
  
  if (slideIndex2 >= numSlides) {
    slideIndex2 = 0;
  } else if (slideIndex2 < 0) {
    slideIndex2 = numSlides - 1;
  }
  
  const offset = -slideIndex2 * 100;
  document.querySelector('.carouselEs2-inner').style.transform = `translateX(${offset}%)`;
}

//Tercer Carucel
// let slideIndex3 = 0;

// function moveSlide3(n) {
//   const slides = document.querySelectorAll('.slideEs3');
//   const numSlides = slides.length;
  
//   slideIndex3 += n;
  
//   if (slideIndex3 >= numSlides) {
//     slideIndex3 = 0;
//   } else if (slideIndex3 < 0) {
//     slideIndex3 = numSlides - 1;
//   }
  
//   const offset = -slideIndex3 * 100;
//   document.querySelector('.carouselEs3-inner').style.transform = `translateX(${offset}%)`;
// }

// let slideIndex3 = 0;

// function moveSlide3(n) {
//   const slides = document.querySelectorAll('.slideEs3');
//   const numSlides = slides.length;
  
//   slideIndex3 += n;
  
//   if (slideIndex3 >= numSlides) {
//     slideIndex3 = 0; // Vuelve al principio si llega al final
//   } else if (slideIndex3 < 0) {
//     slideIndex3 = numSlides - 1; // Vuelve al final si retrocede desde el principio
//   }
  
//   const offset = -slideIndex3 * 100;
//   document.querySelector('.carouselEs3-inner').style.transform = `translateX(${offset}%)`;
// }

let slideIndex3 = 0;

function moveSlide3(n) {
  const slides = document.querySelectorAll('.slideEs3');
  const numSlides = slides.length;
  
  slideIndex3 += n;
  
  if (slideIndex3 >= numSlides) {
    slideIndex3 = 0; // Vuelve al principio si llega al final
  } else if (slideIndex3 < 0) {
    slideIndex3 = numSlides - 1; // Vuelve al final si retrocede desde el principio
  }
  
  const offset = -slideIndex3 * 100;
  document.querySelector('.carouselEs3-inner').style.transform = `translateX(${offset}%)`;
}





