<!DOCTYPE html>
<?php
    session_start();
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MagiK TCG</title>
    <link rel="stylesheet" href="estilos/style.css">
    <script src="https://kit.fontawesome.com/f7a2fd75dd.js" crossorigin="anonymous"></script>
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
            <img src="img/logoGar.png" alt="Logo Gar" class="logoGar">
            <img src="img/logoNombre1.png" alt="MagiKTCG Logo" class="logoNombre">
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
                <button class="btnLogin" onclick="window.location.href='login/front/login.php'">Login</button>
            <?php endif; ?>
            <a href="carrito.html" aria-label="Carrito">
                <i class="fas fa-shopping-cart"></i>
            </a>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li class="menu-productos">
                    <a href="productos/todos.php">Productos</a>
                    <ul class="menuInvisible">
                        <li><a href="productos/japanese.php">Japonés</a></li>
                        <li><a href="productos/korean.php">Coreano</a></li>
                        <li><a href="productos/english.php">Inglés</a></li>
                        <li><a href="productos/spanish.php">Español</a></li>
                    </ul>
                </li>
                <li><a href="politicas/contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Banner Carousel -->
    <div class="contenedor_slider">
    <div class="slider" id="slider">
        <div class="slider_seccion">
        <img src="img/slider/fondobebes.jpg" alt="slider1" class="slider_img" />
        <div class="slider_contenido">
            <h1 class="slider_titulo">¡Bienvenido a MagiKTCG!</h1>
            <p class="slider_txt">Descubre productos eléctricos alucinantes</p>
        </div>
        </div>
        <div class="slider_seccion">
        <img src="img/slider/fondokoraidon.jpg" alt="slider2" class="slider_img" />
        <div class="slider_contenido">
            <h1 class="slider_titulo">¡El fuego de las ofertas!</h1>
            <p class="slider_txt">Charmander trae descuentos ardientes</p>
            <a href="#ofertas" class="slider_link">VER</a>
        </div>
        </div>
        <div class="slider_seccion">
        <img src="img/slider/fondopaldea.png" alt="slider3" class="slider_img" />
        <div class="slider_contenido">
            <h1 class="slider_titulo">¡Refresca tu colección!</h1>
            <p class="slider_txt">Squirtle te espera con lo mejor del agua</p>
            <a href="#novedades" class="slider_link">VER</a>
        </div>
        </div>
    </div>

    <div class="slider_boton slider_boton_izquierda" id="boton_izquierda">&#60;</div>
    <div class="slider_boton slider_boton_derecha" id="boton_derecha">&#62;</div>
    </div>


    <!-- Welcome Section -->
    <section class="welcome-section">
        <div class="welcome-content">
            <div class="welcome-text">
                <h2>Bienvenido a MagiKTCG</h2>
                <p>Aquí podrás encontrar todos los productos de Pokémon TCG actualmente en el mercado. Todos los pedidos se abrirán en directo en TikTok y luego se enviarán a tu domicilio.</p>
                <p>Además, contamos con productos exclusivos y ediciones limitadas que no encontrarás en ningún otro lugar. ¡Únete a nuestra comunidad y vive la emoción de coleccionar con MagiKTCG!</p>
                <h2>¡Horarios de directo!</h2>
                <p>Los directos se realizaran en tik tok y serán cada sabado a las 9p.m hora española</p>
                <p>¡Con posibilidad de directos extra entre semana!</p>
            </div>
            <div class="welcome-image">
                <img src="img/random/garchomp.png" alt="Imagen_Pokémon">
            </div>
        </div>
    </section>

    <!-- Languages Section -->
    <section class="languages-section">
        <h2>Idiomas</h2>
        <div class="languages">
            <a href="productos/english.php"><img src="img/flags/english.png" alt="English"></a>
            <a href="productos/spanish.php"><img src="img/flags/spanish.png" alt="Español"></a>
            <a href="productos/korean.php"><img src="img/flags/korean.png" alt="Coreano"></a>
            <a href="productos/japanese.php"><img src="img/flags/japanese.png" alt="Japonés"></a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-menu">
            <ul>
                <li><a href="politicas/contacto.php">Contacto</a></li>
                <li><a href="politicas/envio.php">Política de Envío</a></li>
                <li><a href="politicas/devolucion.php">Política de Devolución</a></li>
                <li><a href="politicas/privacidad.php">Política de Privacidad</a></li>
                <li><a href="politicas/terminos.php">Términos de Servicio</a></li>
                <li><a href="politicas/aviso_legal.php">Aviso Legal</a></li>
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
    <script src="scripts/carousel.js"></script>
</body>
</html>
