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
    <header class="header">
        <nav class="menu">
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