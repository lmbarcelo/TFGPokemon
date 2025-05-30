document.addEventListener("DOMContentLoaded", function () {
    const paypalContainer = document.getElementById("paypal-button-container");
    const total = parseFloat(paypalContainer.dataset.total);
    const form = document.getElementById("formPago");

    paypal.Buttons({
        style: {
            layout: 'vertical',
            color: 'blue',
            shape: 'rect',
            label: 'paypal'
        },
        onClick: function () {
            // Comprueba que todos los campos obligatorios estén completos antes de pagar
            const requiredFields = form.querySelectorAll("[required]");
            for (let field of requiredFields) {
                if (!field.value.trim()) {
                    alert("Por favor, completa todos los campos antes de pagar.");
                    return false;
                }
            }
        },
        createOrder: function (data, actions) {
            // Crea el pedido con el importe total
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: total.toFixed(2)
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            // Cuando el pago se aprueba, muestra el popup y envía el formulario
            return actions.order.capture().then(function (details) {
                document.getElementById("popup").style.display = "block";

                // Marca el pago como realizado por PayPal
                const input = document.createElement("input");
                input.type = "hidden";
                input.name = "paypal";
                input.value = "1";
                form.appendChild(input);

                // Espera un poco antes de enviar el formulario
                setTimeout(() => {
                    form.submit();
                }, 2500);
            });
        },
        onError: function (err) {
            // Si hay un error con PayPal, muestra un mensaje
            console.error("Error en PayPal:", err);
            alert("Hubo un error con el pago. Intenta de nuevo.");
        }
    }).render('#paypal-button-container');
});
