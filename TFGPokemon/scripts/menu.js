// Muestra el submenú de productos al pasar el ratón
document.addEventListener("DOMContentLoaded", () => {
  const productosMenu = document.querySelector(".menu li:nth-child(2)");

  productosMenu.addEventListener("mouseenter", () => {
    const submenu = productosMenu.querySelector("ul");
    submenu.style.display = "flex";
  });

  productosMenu.addEventListener("mouseleave", () => {
    const submenu = productosMenu.querySelector("ul");
    submenu.style.display = "none";
  });
});

// Controla el menú hamburguesa en móvil/tablet
document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("menu-toggle");
    const menu = document.getElementById("menu");

    toggleBtn.addEventListener("click", function () {
        menu.classList.toggle("show");
    });
});