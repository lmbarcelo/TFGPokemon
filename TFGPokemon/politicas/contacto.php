<!DOCTYPE html>
<?php
    session_start();
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MagiK TCG - Contacto</title>
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

    <section class="form-section">
        <div class="form-content">
            <div class="form-text">
                <h2>Contacto</h2>
                <form action="procesar_contacto.php" method="POST" class="formulario-contacto" id="formContacto">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>

                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="comentario">Comentario:</label>
                    <textarea id="comentario" name="comentario" rows="5" required></textarea>

                    <button type="submit">Enviar</button>
                </form>
                <p class="aviso">Recuerda que no debes enviar información sensible a través de este formulario.</p>
                <p class="aviso">Si tienes alguna duda, consulta nuestra <a href="privacidad.html">Política de Privacidad</a>.</p>
                <!-- popup -->
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <p id="popup-mensaje"></p>
                        <button onclick="cerrarPopup()">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="../scripts/form-contacto.js"></script>
</body>
</html>