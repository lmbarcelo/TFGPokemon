document.addEventListener("DOMContentLoaded", function () {
    const radios = document.querySelectorAll('input[name="metodo_pago"]');
    const paypalContainer = document.getElementById('paypal-button-container');
    const stripeContainer = document.getElementById('stripe-button-container');
    const total = parseFloat(stripeContainer.dataset.total);

    // Crear botón Stripe
    const button = document.createElement("button");
    button.textContent = "Pagar con Stripe";
    button.className = "btnFinalizar";
    button.onclick = async function () {
        const response = await fetch("../pagos/crear_sesion_stripe.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ total: total })
        });

        const session = await response.json();

        const stripe = Stripe("pk_test_xxxxxxxxxxxxxxxxxxxxxxxxx"); // <-- TU PUBLIC KEY
        stripe.redirectToCheckout({ sessionId: session.id });
    };

    stripeContainer.appendChild(button);

    // Mostrar/ocultar contenedores según método de pago
    radios.forEach(radio => {
        radio.addEventListener('change', function () {
            if (this.value === 'paypal') {
                paypalContainer.style.display = 'block';
                stripeContainer.style.display = 'none';
            } else if (this.value === 'stripe') {
                paypalContainer.style.display = 'none';
                stripeContainer.style.display = 'block';
            } else {
                paypalContainer.style.display = 'none';
                stripeContainer.style.display = 'none';
            }
        });
    });
});
