<?php
session_start();

// Solo Admin puede acceder
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'Admin') {
    header('Location: /TFGPokemon/index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Producto</title>
    <link rel="stylesheet" href="/TFGPokemon/estilos/style.css">
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
        <button class="menu-toggle" id="menu-toggle" aria-label="Abrir menú">
            <i class="fa-solid fa-bars"></i>
        </button>
        <a class="logos" href="../index.php">
            <img src="../img/logoGar.png" alt="Logo Gar" class="logoGar">
            <img src="../img/logoNombre1.png" alt="MagiKTCG Logo" class="logoNombre">
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
            <?php include 'header_carrito.php'; ?>
        </div>
        <nav class="menu" id="menu">
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
    <form action="procesar_add_producto.php" method="POST" enctype="multipart/form-data" class="form-admin-producto">
        <h1>Añadir Nuevo Producto</h1>
        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Descripción:</label>
        <textarea name="descripcion" required></textarea>

        <label>Precio (€):</label>
        <input type="number" step="0.01" name="precio" required>

        <label>Stock:</label>
        <input type="number" name="stock" required>

        <label>Idioma:</label>
        <select name="idioma" required>
            <option value="english">Inglés</option>
            <option value="spanish">Español</option>
            <option value="japanese">Japonés</option>
            <option value="korean">Coreano</option>
        </select>

        <label>Categoría ID:</label>
        <input type="number" name="categoria_id" required>

        <label>Imagen:</label>
        <input type="file" name="imagen" accept="image/*" required>

        <button type="submit">Añadir Producto</button>
    </form>
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
</body>
</html>
