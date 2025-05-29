<?php
    session_start();
    $total = 0;
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesar Carrito</title>
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="stylesheet" href="../estilos/pagos/procesar.css">
    <script src="https://kit.fontawesome.com/f7a2fd75dd.js" crossorigin="anonymous"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AegBGFk1kQIB1P8IZ-SbfJofk2TON1ufaI_6pUWe4di7lhMnrHl0KRWaYAlEjvoV73kVBSF6aO87x3HR&currency=USD"></script>
    <script src="../scripts/paypal_script.js" defer></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="../scripts/stripe_script.js" defer></script>

</head>
<body>
    <!-- Banner -->
    <div class="banner">
        <p>Todos los packs se abrirán en TikTok →</p>
        <p>🔴 Live en <a href="https://www.tiktok.com/@magik_tcg" target="_blank" rel="noopener noreferrer">MagiKTCG</a></p>
    </div>

    <!-- Header -->
    <header class="header">
        <div class="logos">
            <img src="../img/logoGar.png" alt="Logo Gar" class="logoGar">
            <img src="../img/logoNombre1.png" alt="MagiKTCG Logo" class="logoNombre">
        </div>
        <div class="buscador">
            <input type="text" name="buscador" placeholder="Buscar productos..." aria-label="Buscar">
            <button type="submit" class="btnBuscador" aria-label="Buscar">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        <div class="log_carrito">
            <?php if ($usuario): ?>
                <span style="color: white; font-weight: bold;">👋 Hola, <?= htmlspecialchars($usuario) ?>!</span>
                <a href="../login/back/logout.php" style="margin-left: 10px; color: white;">Cerrar sesión</a>
            <?php else: ?>
                <button class="btnLogin" onclick="window.location.href='../login/front/login.php'">Login</button>
            <?php endif; ?>
            <?php include '../componentes/header_carrito.php'; ?>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li class="menu-productos">
                    <a href="../productos/todos.php">Productos</a>
                    <ul class="menuInvisible">
                        <li><a href="../productos/japanese.php">Japonés</a></li>
                        <li><a href="../productos/korean.php">Coreano</a></li>
                        <li><a href="../productos/english.php">Inglés</a></li>
                        <li><a href="../productos/spanish.php">Español</a></li>
                    </ul>
                </li>
                <li><a href="../politicas/contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <main class="procesar-main">
        <h2>Resumen del carrito</h2>
        <?php if (!empty($_SESSION['carrito'])): ?>
            <ul class="procesar-lista">
            <?php foreach ($_SESSION['carrito'] as $producto): 
                $subtotal = $producto['precio'] * $producto['cantidad'];
                $total += $subtotal;
            ?>
                <li>
                    <?= htmlspecialchars($producto['nombre']) ?> x<?= $producto['cantidad'] ?> - $<?= number_format($subtotal, 2) ?>
                    <form action="eliminar.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                        <button type="submit" class="btnEliminar">Eliminar</button>
                    </form>
                </li>
            <?php endforeach; ?>
            </ul>
            <p class="procesar-total"><strong>Total: $<?= number_format($total, 2) ?></strong></p>
            
            <section class="procesar-pago">
                <h3>Datos de envío</h3>
                <form action="finalizar.php" method="POST" class="procesar-form">
                    <div class="form-group">
                        <label for="nombre">Nombre completo</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" id="direccion" name="direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" id="ciudad" name="ciudad" required>
                    </div>
                    <div class="form-group">
                        <label for="cp">Código Postal</label>
                        <input type="text" id="cp" name="cp" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" required>
                    </div>
                    <h3>Método de pago</h3>
                    <div class="form-group">
                        <label>
                        <input type="radio" name="metodo_pago" value="stripe" required id="stripe-radio">
                            Stripe (tarjeta)
                        </label>
                        <label>
                            <input type="radio" name="metodo_pago" value="paypal" required id="paypal-radio">
                            PayPal
                        </label>
                    </div>

                    <!-- Contenedor dinámico de PayPal -->
                    <div id="paypal-button-container" data-total="<?= $total ?>" style="display:none; margin-top: 10px;"></div>
                    <!-- Contenedor dinámico de Stripe -->
                    <div id="stripe-button-container" data-total="<?= $total ?>" style="display:none; margin-top: 10px;"></div>

                    <div class="form-group tarjeta-info" style="display:none;">
                        <label for="num_tarjeta">Número de tarjeta</label>
                        <input type="text" id="num_tarjeta" name="num_tarjeta" maxlength="19">
                        <label for="caducidad">Caducidad</label>
                        <input type="text" id="caducidad" name="caducidad" placeholder="MM/AA" maxlength="5">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" maxlength="4">
                    </div>
                    <button type="submit" class="btnFinalizar">Finalizar compra</button>
                </form>
            </section>
        <?php else: ?>
            <p>El carrito está vacío.</p>
        <?php endif; ?>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-menu">
            <ul>
                <li><a href="../politicas/contacto.php">Contacto</a></li>
                <li><a href="../politicas/envio.php">Política de Envío</a></li>
                <li><a href="../politicas/devolucion.php">Política de Devolución</a></li>
                <li><a href="../politicas/privacidad.php">Política de Privacidad</a></li>
                <li><a href="../politicas/terminos.php">Términos de Servicio</a></li>
                <li><a href="../politicas/aviso_legal.php">Aviso Legal</a></li>
            </ul>
        </div>
        <div class="footer-social">
            <a href="https://www.instagram.com" target="_blank" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.tiktok.com" target="_blank" aria-label="TikTok">
                <i class="fab fa-tiktok"></i>
            </a>
        </div>
        <p>&copy; 2025 MagiKTCG. Todos los derechos reservados.</p>
    </footer>

    <script src="../scripts/menu.js"></script>
    <script>
        // Mostrar campos de tarjeta solo si se selecciona "tarjeta"
        document.addEventListener('DOMContentLoaded', function() {
            const radios = document.querySelectorAll('input[name="metodo_pago"]');
            const tarjetaInfo = document.querySelector('.tarjeta-info');
            radios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'tarjeta') {
                        tarjetaInfo.style.display = 'block';
                    } else {
                        tarjetaInfo.style.display = 'none';
                    }
                });
            });
        });
    </script>

</body>
</html>
