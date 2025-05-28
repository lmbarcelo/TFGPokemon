document.addEventListener("DOMContentLoaded", function () {
    // 👉 Mostrar u ocultar el botón de PayPal según el método de pago seleccionado
    const paypalRadio = document.getElementById("paypal-radio");
    const paypalContainer = document.getElementById("paypal-button-container");

    document.querySelectorAll('input[name="metodo_pago"]').forEach(radio => {
        radio.addEventListener('change', function () {
            if (this.value === 'paypal') {
                paypalContainer.style.display = 'block';
            } else {
                paypalContainer.style.display = 'none';
            }
        });
    });

    // 👉 Renderizado del botón de PayPal
    const total = parseFloat(paypalContainer.dataset.total);

    paypal.Buttons({
        style: {
            layout: 'vertical',
            color: 'blue',
            shape: 'rect',
            label: 'paypal'
        },
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: total.toFixed(2)
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
                alert("Pago completado por " + details.payer.name.given_name);
                window.location.href = "finalizar.php?paypal=1";
            });
        },
        onError: function (err) {
            console.error("Error en PayPal:", err);
            alert("Hubo un error con el pago. Intenta de nuevo.");
        }
    }).render('#paypal-button-container');
});
