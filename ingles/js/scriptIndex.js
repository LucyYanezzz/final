document.addEventListener("DOMContentLoaded", function () {
  const heroSection = document.querySelector(".hero");
  heroSection.classList.add("show");

  const textElements = document.querySelectorAll(".appear-left");
  textElements.forEach((element) => {
    element.classList.add("animate__animated", "animate__backInLeft");
  });

  const textElement = document.getElementById("animated-paragraph");
  textElement.classList.add("animate__animated", "animate__bounceInUp");

  const imageElement = document.querySelector(".appear-right");
  imageElement.classList.add("animate__animated", "animate__backInRight");
});

window.addEventListener('load', function() {
  setTimeout(function() {
      // Oculta el indicador de carga
      document.getElementById('loader').style.display = 'none';
  }, 1000); 
});

