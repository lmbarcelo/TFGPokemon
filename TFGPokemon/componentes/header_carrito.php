<?php
// Asegurarse de que la sesión esté activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Inicializar carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}
$carrito = $_SESSION['carrito'];
?>

<!-- Icono de carrito -->
<div class="carrito-container">
    <i class="fas fa-shopping-cart carrito-icono" onclick="toggleCarrito()"></i>
    <div class="carrito-dropdown" id="carritoDropdown">
        <h4>🛒 Tu carrito</h4>
        <?php if (empty($carrito)): ?>
            <p>Tu carrito está vacío.</p>
        <?php else: ?>
            <ul class="carrito-items">
                <?php foreach ($carrito as $item): ?>
                    <li class="carrito-item">
                        <img src="../img/sobres/<?= htmlspecialchars($item['imagen']) ?>" alt="<?= htmlspecialchars($item['nombre']) ?>" class="carrito-img">
                        <div class="carrito-detalles">
                            <span><?= htmlspecialchars($item['nombre']) ?></span>
                            <span>Cant: <?= $item['cantidad'] ?> x $<?= number_format($item['precio'], 2) ?></span>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <a href="../pagos/checkout.php" class="btn-checkout">Procesar pago</a>
        <?php endif; ?>
    </div>
</div>

<script>
function toggleCarrito() {
    const dropdown = document.getElementById("carritoDropdown");
    dropdown.classList.toggle("activo");
}
</script>
