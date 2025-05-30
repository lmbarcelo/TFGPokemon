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
    <link rel="stylesheet" href="../../estilos/register/registro.css">
    <link rel="stylesheet" href="../../estilos/style.css">
    <script src="https://kit.fontawesome.com/f7a2fd75dd.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <button class="menu-toggle" id="menu-toggle" aria-label="Abrir menú">
            <i class="fa-solid fa-bars"></i>
        </button>
        <a class="logos" href="../../index.php">
            <img src="../../img/logoGar.png" alt="Logo Gar" class="logoGar">
            <img src="../../img/logoNombre1.png" alt="MagiKTCG Logo" class="logoNombre">
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
                <a href="../../componentes/admin_add_product.php" style="margin-left: 10px; color: yellow;">Modo Admin</a>
            <?php endif; ?>
            <?php if ($usuario): ?>
                <span style="color: white; font-weight: bold;">👋 Hola, <?= htmlspecialchars($usuario) ?>!</span>
                <a href="../back/logout.php" style="margin-left: 10px; color: white;">Cerrar sesión</a>
            <?php else: ?>
                <button class="btnLogin" onclick="window.location.href='login.php'">Login</button>
            <?php endif; ?>
            <?php include '../../componentes/header_carrito.php'; ?>
        </div>
        <nav class="menu" id="menu">
            <ul>
                <li><a href="../../index.php">Inicio</a></li>
                <li class="menu-productos">
                    <a href="../../productos/todos.php">Productos</a>
                    <ul class="menuInvisible">
                        <li><a href="../../productos/japanese.php">Japonés</a></li>
                        <li><a href="../../productos/korean.php">Coreano</a></li>
                        <li><a href="../../productos/english.php">Inglés</a></li>
                        <li><a href="../../productos/spanish.php">Español</a></li>
                    </ul>
                </li>
                <li><a href="../../politicas/contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>

  <!-- Registro Form -->
  <div class="login">
    <h2>Registro</h2>
    <form action="../back/registro.php" method="POST">
      <div class="input">
        <input class="input1" type="text" name="nombre" placeholder="Nombre completo" required />
      </div>
      <div class="input">
        <input class="input1" type="email" name="email" placeholder="Correo electrónico" required />
      </div>
      <div class="input">
        <input class="input1" type="password" name="password" placeholder="Contraseña" required />
      </div>
      <div class="button">
        <button type="submit">Registrarse</button>
      </div>
    </form>
    <div class="sign-up">
      <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
      <div class="footer-menu">
          <ul>
              <li><a href="../../politicas/contacto.php">Contacto</a></li>
              <li><a href="../../politicas/envio.php">Política de Envío</a></li>
              <li><a href="../../politicas/devolucion.php">Política de Devolución</a></li>
              <li><a href="../../politicas/privacidad.php">Política de Privacidad</a></li>
              <li><a href="../../politicas/terminos.php">Términos de Servicio</a></li>
              <li><a href="../../politicas/aviso_legal.php">Aviso Legal</a></li>
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
  <script src="../../scripts/menu.js"></script>
</body>
</html>
