<?php
require '../vendor/autoload.php'; //Instala Stripe con Composer y carga el autoload

\Stripe\Stripe::setApiKey('sk_test_xxxxxxxxxxxxxxxxxxxxxx'); // <-- TU SECRET KEY

$data = json_decode(file_get_contents('php://input'), true);
$total = $data['total'];

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => 'Compra en MagiKTCG',
            ],
            'unit_amount' => intval($total * 100),
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://tusitio.com/pagos/exito.php',
    'cancel_url' => 'https://tusitio.com/pagos/cancelado.php',
]);

echo json_encode(['id' => $session->id]);

// Me he quedado con el código de Stripe para crear una sesión de pago.
// Asegúrate de reemplazar 'sk_test_xxxxxxxxxxxxxxxxxxxxxx' con tu propia clave secreta de Stripe.
