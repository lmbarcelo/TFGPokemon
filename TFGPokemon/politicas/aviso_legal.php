<!DOCTYPE html>
<?php
    session_start();
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviso Legal</title>
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

    <section class="politicas-aviso-legal">
        <h1>Aviso Legal</h1>
        <article>
            <h2>AVISO LEGAL Y CONDICIONES GENERALES DE USO</h2>
            <p><strong>https://magiktcg.com/</strong></p>
            <p>Tienda Oficial de MagiKTCG y de productos anunciados o expuestos en nuestras plataformas. Se entiende esta web como una extensión comercial y promocional para facilitar a los seguidores la compra de coleccionables.</p>
        </article>

        <article>
            <h2>I. INFORMACIÓN GENERAL</h2>
            <p>En cumplimiento con el deber de información dispuesto en la Ley 34/2002 de Servicios de la Sociedad de la Información y el Comercio Electrónico (LSSI-CE) de 11 de julio, se facilitan a continuación los siguientes datos de información general de este sitio web:</p>
            <p>La titularidad de este sitio web, <strong>https://magiktcg.com/</strong>, (en adelante, Sitio Web) la ostenta: MagiKTCG, cuyos datos de contacto son:</p>
            <ul>
                <li><strong>Dirección:</strong> Manuel Azaña 22, CP: 07006 Palma, Islas Baleares. España</li>
                <li><strong>Teléfono de contacto:</strong> +34 678037775</li>
                <li><strong>Email de contacto:</strong> lluismunoz7@gmail.com</li>
            </ul>
        </article>

        <article>
            <h2>II. TÉRMINOS Y CONDICIONES GENERALES DE USO</h2>
            <p>El objeto de las presentes Condiciones Generales de Uso (en adelante, Condiciones) es regular el acceso y la utilización del Sitio Web. A los efectos de las presentes Condiciones se entenderá como Sitio Web: la apariencia externa de los interfaces de pantalla, tanto de forma estática como de forma dinámica, es decir, el árbol de navegación; y todos los elementos integrados tanto en los interfaces de pantalla como en el árbol de navegación (en adelante, Contenidos) y todos aquellos servicios o recursos en línea que en su caso ofrezca a los Usuarios (en adelante, Servicios).</p>
            <p>MagiKTCG se reserva la facultad de modificar, en cualquier momento, y sin aviso previo, la presentación y configuración del Sitio Web y de los Contenidos y Servicios que en él pudieran estar incorporados.</p>
            <p>El acceso, la navegación y uso del Sitio Web confiere la condición de Usuario, por lo que se aceptan, desde que se inicia la navegación por el Sitio Web, todas las Condiciones aquí establecidas.</p>
        </article>

        <article>
            <h2>III. ACCESO Y NAVEGACIÓN EN EL SITIO WEB: EXCLUSIÓN DE GARANTÍAS Y RESPONSABILIDAD</h2>
            <p>MagiKTCG no garantiza la continuidad, disponibilidad y utilidad del Sitio Web, ni de los Contenidos o Servicios. MagiKTCG hará todo lo posible por el buen funcionamiento del Sitio Web, sin embargo, no se responsabiliza ni garantiza que el acceso a este Sitio Web no vaya a ser ininterrumpido o que esté libre de error.</p>
            <p>En ningún caso MagiKTCG será responsable por las pérdidas, daños o perjuicios de cualquier tipo que surjan por el acceso, navegación y el uso del Sitio Web.</p>
        </article>

        <article>
            <h2>IV. POLÍTICA DE ENLACES</h2>
            <p>Se informa que el Sitio Web de MagiKTCG pone o puede poner a disposición de los Usuarios medios de enlace (como, entre otros, links, banners, botones), directorios y motores de búsqueda que permiten a los Usuarios acceder a sitios web pertenecientes y/o gestionados por terceros.</p>
            <p>MagiKTCG no asume ninguna responsabilidad por los daños y perjuicios que pudieran producirse por el acceso, uso, calidad o licitud de los contenidos, comunicaciones, opiniones, productos y servicios de los sitios web no gestionados por MagiKTCG y que sean enlazados en este Sitio Web.</p>
        </article>

        <article>
            <h2>V. PROPIEDAD INTELECTUAL E INDUSTRIAL</h2>
            <p>MagiKTCG es titular de todos los derechos de propiedad intelectual e industrial del Sitio Web, así como de los elementos contenidos en el mismo. Quedan expresamente prohibidas la reproducción, la distribución y la comunicación pública, incluida su modalidad de puesta a disposición, de la totalidad o parte de los contenidos de esta página web, con fines comerciales, en cualquier soporte y por cualquier medio técnico, sin la autorización de MagiKTCG.</p>
        </article>

        <article>
            <h2>VI. ACCIONES LEGALES, LEGISLACIÓN APLICABLE Y JURISDICCIÓN</h2>
            <p>MagiKTCG se reserva la facultad de presentar las acciones civiles o penales que considere necesarias por la utilización indebida del Sitio Web y Contenidos, o por el incumplimiento de las presentes Condiciones.</p>
            <p>La relación entre el Usuario y MagiKTCG se regirá por la normativa vigente y de aplicación en el territorio español.</p>
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