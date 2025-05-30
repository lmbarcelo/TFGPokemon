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
        <p>Todos los packs se abrirán en TikTok</p>
        <p>🔴 Live en <a href="https://www.tiktok.com/@magik_tcg" target="_blank" rel="noopener noreferrer">MagiKTCG</a></p>
    </div>

    <!-- Header -->
    <header class="header">
        <button class="menu-toggle" id="menu-toggle" aria-label="Abrir menú">
            <i class="fa-solid fa-bars"></i>
        </button>
        <a class="logos" href="index.php">
            <img src="img/logoGar.png" alt="Logo Gar" class="logoGar">
            <img src="img/logoNombre1.png" alt="MagiKTCG Logo" class="logoNombre">
        </a>
        <div class="buscador">
            <form action="/TFGPokemon/buscar.php" method="GET" style="display:flex;">
                <input type="text" name="q" placeholder="Buscar productos..." aria-label="Buscar" required>
                <button type="submit" class="btnBuscador" aria-label="Buscar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <div class="log_carrito">
            <?php if ($usuario === 'Admin'): ?>
                <a href="componentes/admin_add_product.php" style="margin-left: 10px; color: yellow;">Modo Admin</a>
            <?php endif; ?>
            <?php if ($usuario): ?>
                <span style="color: white; font-weight: bold;">👋 Hola, <?= htmlspecialchars($usuario) ?>!</span>
                <a href="login/back/logout.php" style="margin-left: 10px; color: white;">Cerrar sesión</a>
            <?php else: ?>
                <button class="btnLogin" onclick="window.location.href='login/front/login.php'">Login</button>
            <?php endif; ?>
            <?php include 'componentes/header_carrito.php'; ?>
        </div>
        <nav class="menu" id="menu">
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
        <img src="img/slider/fondokoraidon.jpg" alt="slider1" class="slider_img" />
        <div class="slider_contenido">
            <h1 class="slider_titulo">¡Bienvenido a MagiKTCG!</h1>
            <p class="slider_txt">Descubre productos eléctricos alucinantes</p>
        </div>
        </div>
        <div class="slider_seccion">
        <img src="img/slider/fondobebes.jpg" alt="slider2" class="slider_img" />
        <div class="slider_contenido">
            <h1 class="slider_titulo">¡Todos los idiomas!</h1>
            <p class="slider_txt">Encuentra tu producto favorito en tu idioma</p>
            <a href="productos/todos.php" class="slider_link">VER</a>
        </div>
        </div>
        <div class="slider_seccion">
        <img src="img/slider/fondopaldea.png" alt="slider3" class="slider_img" />
        <div class="slider_contenido">
            <h1 class="slider_titulo">¡Ahora en Coreano!</h1>
            <p class="slider_txt">Nuevos productos en Coreano</p>
            <a href="productos/korean.php" class="slider_link">VER</a>
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
                <h2>¡Bienvenido a MagiKTCG!</h2>
                <p>¿Eres fan de Pokémon TCG? Aquí tienes tu tienda de confianza para encontrar sobres, cajas y cartas exclusivas de todos los idiomas: japonés, inglés, español y coreano.</p>
                <ul>
                    <li>🎁 Productos 100% originales y sellados</li>
                    <li>📦 Envíos rápidos a toda España</li>
                    <li>🎬 ¡Tus pedidos se abren en directo en <b>TikTok Live</b>!</li>
                    <li>🏆 Sorteos y promociones para la comunidad</li>
                </ul>
                <div>
                    <strong>¿Nuevo aquí?</strong> Únete a nuestra comunidad en TikTok y vive la emoción de cada apertura en directo. ¡Participa en el chat y haz tus preguntas en tiempo real!
                </div>
                <h3 style="margin-top:1.5em;">⏰ Horarios de directo</h3>
                <p>
                    <b>Sábados a las 21:00 (hora española)</b> en <a href="https://www.tiktok.com/@magik_tcg" target="_blank">TikTok Live</a>.<br>
                    ¡Y directos sorpresa entre semana!
                </p>
            </div>
            <div class="welcome-image">
                <img src="img/random/garchomp.png" alt="Imagen_Pokémon">
                <div>
                    <span>¡Atrapa tus cartas favoritas y comparte la experiencia!</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Languages Section -->
    <section class="languages-section">
        <h2>Productos</h2>
        <div class="languages">
            <a href="productos/english.php"><img src="img/flags/english.png" alt="English"></a>
            <a href="productos/spanish.php"><img src="img/flags/spanish.png" alt="Español"></a>
            <a href="productos/korean.php"><img src="img/flags/korean.png" alt="Coreano"></a>
            <a href="productos/japanese.php"><img src="img/flags/japanese.png" alt="Japonés"></a>
        </div>
    </section>

    <!-- TikTok Section -->
    <section class="tiktok-section">
        <h2>Síguenos en TikTok</h2>
        <blockquote class="tiktok-embed"
            cite="https://www.tiktok.com/@magik_tcg/video/7467557238404648224"
            data-video-id="7467557238404648224"
            style="max-width: 250px;min-width: 325px;">
            <section>
                <a target="_blank" title="@magik_tcg" href="https://www.tiktok.com/@magik_tcg?refer=embed">@magik_tcg</a>
                3 sobres de Twilight Masquerade  ¿Hago videos con mi voz o con IA de texto?
                <a title="twilight" target="_blank" href="https://www.tiktok.com/tag/twilight?refer=embed">#twilight</a>
                <a title="tcg" target="_blank" href="https://www.tiktok.com/tag/tcg?refer=embed">#tcg</a>
                <a title="pokemon" target="_blank" href="https://www.tiktok.com/tag/pokemon?refer=embed">#pokemon</a>
                #pokemontcg
                <a title="twtilightmasquerade" target="_blank" href="https://www.tiktok.com/tag/twtilightmasquerade?refer=embed">#twtilightmasquerade</a>
                <a title="sobres" target="_blank" href="https://www.tiktok.com/tag/sobres?refer=embed">#sobres</a>
                <a title="sobrespokemon" target="_blank" href="https://www.tiktok.com/tag/sobrespokemon?refer=embed">#sobrespokemon</a>
                <a title="apertura" target="_blank" href="https://www.tiktok.com/tag/apertura?refer=embed">#apertura</a>
                <a title="relax" target="_blank" href="https://www.tiktok.com/tag/relax?refer=embed">#relax</a>
                <a target="_blank" title="♬ Chill and gentle lo-fi/10 minutes(1455687) - nightbird_bgm" href="https://www.tiktok.com/music/Chill-and-gentle-lo-fi10-minutes-1455687-7247207913034614785?refer=embed">♬ Chill and gentle lo-fi/10 minutes(1455687) - nightbird_bgm</a>
            </section>
        </blockquote>
        <script async src="https://www.tiktok.com/embed.js"></script>
        <div style="margin-top: 1em;">
            <a href="https://www.tiktok.com/@magik_tcg" target="_blank" rel="noopener" class="tiktok-link">
                <i class="fab fa-tiktok"></i> Visita mi TikTok
            </a>
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
