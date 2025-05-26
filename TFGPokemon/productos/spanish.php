<!DOCTYPE html>
<?php
    session_start();
    $conexion = new mysqli("localhost", "root", "", "magiktcg");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Español</title>
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
            <a href="carrito.html" aria-label="Carrito">
                <i class="fas fa-shopping-cart"></i>
            </a>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li class="menu-productos">
                    <a href="todos.php">Productos</a>
                    <ul class="menuInvisible">
                        <li><a href="japanese.php">Japonés</a></li>
                        <li><a href="korean.php">Coreano</a></li>
                        <li><a href="english.php">Inglés</a></li>
                        <li><a href="spanish.php">Español</a></li>
                    </ul>
                </li>
                <li><a href="../politicas/contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <?php
        $query = "SELECT * FROM productos WHERE idioma = 'spanish'";
        $resultado = $conexion->query($query);
    ?>
    <section class="productos">
        <h1>Productos en Español</h1>
        <p>Explora nuestra selección de productos en español. ¡Encuentra lo que buscas!</p>
        <div class="contenedor-productos">
            <?php while ($row = $resultado->fetch_assoc()): ?>
                <div class="producto">
                    <img src="../img/sobres/<?= htmlspecialchars($row['imagen']) ?>" alt="<?= htmlspecialchars($row['nombre']) ?>">
                    <h3><?= htmlspecialchars($row['nombre']) ?></h3>
                    <p>Precio: $<?= number_format($row['precio'], 2) ?></p>
                    <button>Añadir al carrito</button>
                </div>
            <?php endwhile; ?>
        </div>
    </section>


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
</body>
</html>