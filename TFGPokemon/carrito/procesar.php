<?php
    session_start();
    $total = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesar Carrito</title>
    <link rel="stylesheet" href="../estilos/style.css">
</head>
<body>
    <h2>Resumen del carrito</h2>
    <?php if (!empty($_SESSION['carrito'])): ?>
        <ul>
        <?php foreach ($_SESSION['carrito'] as $producto): 
            $subtotal = $producto['precio'] * $producto['cantidad'];
            $total += $subtotal;
        ?>
            <li>
                <?= htmlspecialchars($producto['nombre']) ?> x<?= $producto['cantidad'] ?> - $<?= number_format($subtotal, 2) ?>
                <form action="eliminar.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        <?php endforeach; ?>
        </ul>
        <p><strong>Total: $<?= number_format($total, 2) ?></strong></p>
        <button>Finalizar compra</button>
    <?php else: ?>
        <p>El carrito está vacío.</p>
    <?php endif; ?>
</body>
</html>
