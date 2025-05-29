// scripts/pokemon-carousel.js

document.addEventListener("DOMContentLoaded", () => {
  const slider = document.querySelector("#slider");
  let sliderSections = document.querySelectorAll(".slider_seccion");
  let lastSection = sliderSections[sliderSections.length - 1];

  // Coloca la última al inicio
  slider.insertAdjacentElement("afterbegin", lastSection);

  function siguiente() {
    let firstSection = document.querySelectorAll(".slider_seccion")[0];
    slider.style.marginLeft = "-200%";
    slider.style.transition = "all 0.5s";

    setTimeout(() => {
      slider.style.transition = "none";
      slider.insertAdjacentElement("beforeend", firstSection);
      slider.style.marginLeft = "-100%";
    }, 500);
  }

  function anterior() {
    let sections = document.querySelectorAll(".slider_seccion");
    let lastSection = sections[sections.length - 1];
    slider.style.marginLeft = "0";
    slider.style.transition = "all 0.5s";

    setTimeout(() => {
      slider.style.transition = "none";
      slider.insertAdjacentElement("afterbegin", lastSection);
      slider.style.marginLeft = "-100%";
    }, 500);
  }

  document.getElementById("boton_derecha").addEventListener("click", siguiente);
  document.getElementById("boton_izquierda").addEventListener("click", anterior);

  setInterval(siguiente, 10000); // cada 10 segundos
});
