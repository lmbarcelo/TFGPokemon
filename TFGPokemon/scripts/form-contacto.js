document.addEventListener("DOMContentLoaded", function () {
    const formulario = document.getElementById("formContacto");
    const popup = document.getElementById("popup");
    const mensaje = document.getElementById("popup-mensaje");

    formulario.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(formulario);

        fetch("procesar_contacto.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            mensaje.innerText = data;
            popup.style.display = "flex";
            formulario.reset();
        })
        .catch(error => {
            mensaje.innerText = "Ocurrió un error. Intenta de nuevo.";
            popup.style.display = "flex";
            console.error("Error en la petición:", error);
        });
    });
});

function cerrarPopup() {
    document.getElementById("popup").style.display = "none";
}
