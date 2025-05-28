<!DOCTYPE html>
<?php
    session_start();
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politica Devoluciones</title>
    <link rel="stylesheet" href="../estilos/style.css">
    <script src="https://kit.fontawesome.com/f7a2fd75dd.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Banner -->
    <div class="banner">
        <p>Todos los packs se abrirán en TikTok →</p>
        <p>🔴 Live en <a href="https://www.tiktok.com/@magik_tcg" target="_blank" rel="noopener noreferrer">MagiKTCG</a></p>
    </div>

    <!-- Header -->
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
                <a href="login/back/logout.php" style="margin-left: 10px; color: white;">Cerrar sesión</a>
            <?php else: ?>
                <button class="btnLogin" onclick="window.location.href='login/front/login.html'">Login</button>
            <?php endif; ?>
            <a href="carrito.php" aria-label="Carrito">
                <i class="fas fa-shopping-cart"></i>
            </a>
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
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <section class="politicas-devolucion">
        <h1>Política de Reembolso</h1>
        <article>
            <h2>DEVOLUCIONES</h2>
            <p>Nuestra política dura 14 días. Si pasaron 14 días desde su compra, desafortunadamente no podemos ofrecerle un reembolso ni un cambio.</p>
            <p>Para ser elegible para una devolución, su artículo debe estar sin usar y en la misma condición en que lo recibió. También debe estar en el embalaje original, con la pegatina o film protector sin daños.</p>
            <ul>
                <li>No se pueden devolver productos en pre-venta ni tarjetas regalo.</li>
                <li>No se pueden devolver productos que han sido abiertos en nuestros directos.</li>
            </ul>
            <p>Los costos de envío para devolver su artículo corren por su cuenta. Los costos de envío no son reembolsables. Si recibe un reembolso, el costo de envío de la devolución se deducirá de su reembolso.</p>
            <p>Para solicitar la devolución debe contactar por email a <strong>lluismunoz7@gmail.com</strong> o WhatsApp <strong>+34 678037775</strong>.</p>
            <p>Para completar su devolución, necesitamos un recibo o comprobante de compra. Podrá ser requerida una imagen de los productos.</p>
            <p>Una vez recibida e inspeccionada su devolución, le enviaremos un correo electrónico para notificarle que recibimos el artículo que devolvió. También le notificaremos sobre la aprobación o el rechazo de su reembolso.</p>
            <p>Si se aprueba, se procesará su reembolso y se aplicará un crédito automáticamente en su tarjeta de crédito o método de pago original.</p>
        </article>

        <article>
            <h2>REEMBOLSOS TARDÍOS O FALTANTES</h2>
            <p>Si pasado unos días no recibió un reembolso, primero revise de nuevo su cuenta bancaria.</p>
            <p>Luego, comuníquese con la empresa de su tarjeta de crédito. Puede demorar algún tiempo antes de que su reembolso se vea reflejado de manera oficial.</p>
            <p>Después, contacte a su banco. A menudo es necesario un tiempo de procesamiento antes de poder ver reflejado un reembolso.</p>
            <p>Si ya hizo todo lo anterior y aún no recibió su reembolso, puede contactarnos escribiendo a <strong>lluismunoz7@gmail.com</strong>.</p>
        </article>

        <article>
            <h2>CAMBIO DE PRODUCTO</h2>
            <p>Solo reemplazamos los artículos si están defectuosos o dañados. Si necesita cambiarlo por el mismo artículo, envíenos un correo electrónico a <strong>lluismunoz7@gmail.com</strong>.</p>
        </article>

        <article>
            <h2>PEDIDOS NO ENTREGADOS</h2>
            <p>Si el pedido fue rechazado o no recogido por el comprador en el plazo establecido por correos, el costo de envío de la devolución se deducirá de su reembolso por el mismo valor del coste de envío inicial.</p>
        </article>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-menu">
            <ul>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="envio.php">Política de Envío</a></li>
                <li><a href="devolucion.php">Política de Devolución</a></li>
                <li><a href="privacidad.php">Política de Privacidad</a></li>
                <li><a href="terminos.php">Términos de Servicio</a></li>
                <li><a href="aviso_legal.php">Aviso Legal</a></li>
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
</body>
</html>