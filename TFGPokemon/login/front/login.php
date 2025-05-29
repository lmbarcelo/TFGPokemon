<!DOCTYPE html>
<?php
    session_start();
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../estilos/login/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f7a2fd75dd.js" crossorigin="anonymous"></script>
    <title>Login</title>
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
            <img src="../../img/logoGar.png" alt="Logo Gar" class="logoGar">
            <img src="../../img/logoNombre1.png" alt="MagiKTCG Logo" class="logoNombre">
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
                <a href="../back/logout.php" style="margin-left: 10px; color: white;">Cerrar sesión</a>
            <?php else: ?>
                <button class="btnLogin" onclick="window.location.href='../login.php'">Login</button>
            <?php endif; ?>
            <?php include '../../componentes/header_carrito.php'; ?>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="../../index.php">Inicio</a></li>
                <li class="menu-productos">
                    <a href="todos.php">Productos</a>
                    <ul class="menuInvisible">
                        <li><a href="../../productos/japanese.php">Japonés</a></li>
                        <li><a href="../../productos/korean.php">Coreano</a></li>
                        <li><a href="../../productos/english.php">Inglés</a></li>
                        <li><a href="../../productos/spanish.php">Español</a></li>
                    </ul>
                </li>
                <li><a href="../politicas/contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <div class="background"></div>
    <section class="home">
        <div class="content">
            <img src="../../img/logoNombre1.png" alt="logo" width="60%">
            <h2> ¡Bienvenido! </h2>
            <h3> A  MagiKTCG </h3>
            <p>Regístrate y accede con tu cuenta para descubrir y comprar los mejores productos de MagiKTCG.</p>
            <div class="icon">
                <a href="https://www.instagram.com" target="_blank" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.tiktok.com" target="_blank" aria-label="TikTok">
                    <i class="fab fa-tiktok"></i>
                </a>
            </div>
            
        </div>
        <div class="login">
            <h2> Iniciar Sesión </h2>
            <form action="../back/login.php" method="POST">
                <div class="input">
                    <input type="email" class="input1" name="email" placeholder="Correo" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="input">
                    <input type="password" class="input1" name="password" placeholder="Contraseña" required>
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="check">
                    <label><input type="checkbox">Recuérdame</label>
                    <a href="#">¿Has olvidado la contraseña?</a>
                </div>
                <div class="button">
                    <button class="btn" type="submit">Iniciar Sesión</button>
                </div>
            </form>
            <div class="sign-up">
                <p> ¿No tienes cuenta? </p>
                <a href="registro.php"> Regístrate </a>
            </div>
        </div>
    </section>
    <script src="../../scripts/menu.js"></script>
</body>
</html>