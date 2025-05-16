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
