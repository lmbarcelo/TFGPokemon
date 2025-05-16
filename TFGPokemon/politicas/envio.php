<!DOCTYPE html>
<?php
    session_start();
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politica Envios</title>
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
                    <a href="../idiomas/todos.php">Productos</a>
                    <ul class="menuInvisible">
                        <li><a href="../idiomas/japanese.php">Japonés</a></li>
                        <li><a href="../idiomas/korean.php">Coreano</a></li>
                        <li><a href="../idiomas/english.php">Inglés</a></li>
                        <li><a href="../idiomas/spanish.php">Español</a></li>
                    </ul>
                </li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <section class="politicas-envio">
        <h1>Política de envío</h1>
        <article>
            <h2>ENVÍOS</h2>
            <p>Los pedidos se tramitan en un plazo aproximado de 24 horas (laborales).</p>
            <p>Los envíos se realizan desde España con servicio de paquetería premium de correos. Tiempo de llegada aproximada 24/48 horas en la península.</p>
            <p>Las tarifas de envío incluyen el servicio de envío, embalaje y manipulación. Varían según el lugar de destino y el peso del paquete.</p>
            <p>Realizamos envíos a toda España y Portugal, incluyendo Baleares, Canarias, Ceuta y Melilla.</p>
            <p>Próximamente realizaremos envíos al resto de Europa.</p>
        </article>

        <article>
            <h2>SEGUIMIENTO</h2>
            <p>Cuando realice un pedido, recibirá un SMS o email con la confirmación del envío y un código de seguimiento que podrá rastrear por la web de correos para consultar el proceso.</p>
            <p>Si su pedido se retrasa más de lo esperado, podrá contactar con soporte de correos para más información.</p>
        </article>

        <article>
            <h2>PRODUCTOS GUARDADOS PARA ENVÍOS FUTUROS</h2>
            <p>Los clientes podrán almacenar producto sin enviar durante un máximo de dos semanas. Una vez pasado este tiempo, si el cliente no ha solicitado el envío, se le contactará por los medios disponibles para acordar un envío con su correspondiente pago si fuese el caso.</p>
            <p>Si pasados un máximo de 4 meses desde la realización del pedido el cliente no da ninguna respuesta o solución, el producto se dará por perdido sin posibilidad de recuperación.</p>
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


    <script src="scripts/menu.js"></script>
</body>
</html>