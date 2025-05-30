<?php
    session_start();
    $total = 0;
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Procesar Carrito</title>
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="stylesheet" href="../estilos/pagos/procesar.css">
    <script src="https://kit.fontawesome.com/f7a2fd75dd.js" crossorigin="anonymous"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AegBGFk1kQIB1P8IZ-SbfJofk2TON1ufaI_6pUWe4di7lhMnrHl0KRWaYAlEjvoV73kVBSF6aO87x3HR&currency=USD"></script>
    <script src="../scripts/paypal_script.js" defer></script>

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
            <?php if ($usuario === 'Admin'): ?>
                <a href="../componentes/admin_add_product.php" style="margin-left: 10px; color: yellow;">Modo Admin</a>
            <?php endif; ?>
            <?php if ($usuario): ?>
                <span style="color: white; font-weight: bold;">👋 Hola, <?= htmlspecialchars($usuario) ?>!</span>
                <a href="../login/back/logout.php" style="margin-left: 10px; color: white;">Cerrar sesión</a>
            <?php else: ?>
                <button class="btnLogin" onclick="window.location.href='../login/front/login.php'">Login</button>
            <?php endif; ?>
            <?php include '../componentes/header_carrito.php'; ?>
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

    <main class="procesar-main">
        <h2>Resumen del carrito</h2>
        <?php if (!empty($_SESSION['carrito'])): ?>
            <ul class="procesar-lista">
            <?php foreach ($_SESSION['carrito'] as $producto): 
                $subtotal = $producto['precio'] * $producto['cantidad'];
                $total += $subtotal;
            ?>
                <li>
                    <div class="producto-detalle">
                        <img class="producto-img" src="../img/sobres/<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['nombre']) ?>">
                        <div class="producto-info">
                            <span class="producto-nombre"><?= htmlspecialchars($producto['nombre']) ?> (<?= htmlspecialchars($producto['idioma']) ?>)</span>
                            <span class="producto-cantidad">x<?= $producto['cantidad'] ?></span>
                            <span class="producto-precio">$<?= number_format($subtotal, 2) ?></span>
                        </div>
                    </div>
                    <form action="eliminar.php" method="POST">
                        <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                        <button type="submit" class="btnEliminar">Eliminar</button>
                    </form>
                </li>
            <?php endforeach; ?>
            </ul>
            <p class="procesar-total"><strong>Total: $<?= number_format($total, 2) ?></strong></p>
            
            <section class="procesar-pago">
                <h3>Datos de envío</h3>
                <!-- FORMULARIO -->
                <form id="formPago" action="finalizar.php" method="POST" class="procesar-form">
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
                    <!-- Pop-up de éxito -->
                    <div id="popup" style="display:none; position:fixed; top:30%; left:50%; transform:translate(-50%,-50%); background:#fff; padding:30px; border-radius:10px; box-shadow:0 0 20px rgba(0,0,0,0.3); z-index:1000;">
                        <h2>🎉 ¡Gracias por tu compra!</h2>
                        <p>Hemos recibido tu pedido correctamente. Te llegará pronto. 🛒</p>
                        <button onclick="document.getElementById('popup').style.display='none'">Cerrar</button>
                    </div>
                    <!-- Botón de PayPal visible directamente -->
                    <div id="paypal-button-container" data-total="<?= $total ?>" style="margin-top: 20px;"></div>
                </form>
                <div id="paypal-button-container" data-total="<?= $total ?>" style="margin-top: 20px;"></div>
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

</body>
</html>

<!-- Base de datos -->
 <!-- CREATE DATABASE IF NOT EXISTS magiktcg;
USE magiktcg;

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    direccion TEXT NOT NULL,
    ciudad VARCHAR(100) NOT NULL,
    cp VARCHAR(10) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    producto VARCHAR(255) NOT NULL,
    idioma VARCHAR(50) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP
); -->
