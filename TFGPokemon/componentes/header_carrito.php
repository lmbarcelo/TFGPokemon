<?php
    $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
?>
<div class="carrito-desplegable">
    <i class="fas fa-shopping-cart" onclick="toggleCarrito()"></i>
    <div id="ventana-carrito" class="ventana-carrito oculto">
        <h4>🛒 Tu carrito</h4>
        <?php if (!empty($_SESSION['carrito'])): ?>
            <ul>
                <?php foreach ($carrito as $item): ?>
                    <li class="carrito-item">
                        <img src="/TFGPokemon/img/sobres/<?= htmlspecialchars($item['imagen']) ?>" alt="<?= htmlspecialchars($item['nombre']) ?>" class="carrito-img">
                        <div class="carrito-detalles">
                            <span><?= htmlspecialchars($item['nombre']) ?> (<?= htmlspecialchars($item['idioma']) ?>)</span>
                            <span>Cant: <?= $item['cantidad'] ?> x $<?= number_format($item['precio'], 2) ?></span>
                        </div>
                        <form action="/TFGPokemon/carrito/eliminar.php" method="POST">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="submit">❌ Eliminar</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
            <form action="/TFGPokemon/carrito/limpiar.php" method="POST">
                <button type="submit">🧹 Vaciar carrito</button>
            </form>
            <a href="/TFGPokemon/carrito/procesar.php" class="btn-procesar">Procesar pago</a>
        <?php else: ?>
            <p>El carrito está vacío</p>
        <?php endif; ?>
    </div>
</div>

<script>
function toggleCarrito() {
    document.getElementById("ventana-carrito").classList.toggle("oculto");
}
</script>

