<!DOCTYPE html>
<?php
    session_start();
    $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politica Privacidad</title>
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
                <a href="../login/back/logout.php" style="margin-left: 10px; color: white;">Cerrar sesión</a>
            <?php else: ?>
                <button class="btnLogin" onclick="window.location.href='../login/front/login.php'">Login</button>
            <?php endif; ?>
            <?php include '../componentes/header_carrito.php'; ?>
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
    <section class="politicas-privacidad">
        <h1>Política de Privacidad</h1>
        <article>
            <p>Esta Política describe cómo se recopila, utiliza y comparte su información personal cuando visita o hace una compra en <strong>https://magiktcg.com</strong>.</p>
        </article>

        <article>
            <h2>INFORMACIÓN PERSONAL QUE RECOPILAMOS</h2>
            <p>Cuando visita el Sitio, recopilamos automáticamente cierta información sobre su dispositivo, incluida información sobre su navegador web, dirección IP, zona horaria y algunas de las cookies que están instaladas en su dispositivo. Además, a medida que navega por el Sitio, recopilamos información sobre las páginas web individuales o los productos que ve, las páginas web o los términos de búsqueda que lo remitieron al Sitio e información sobre cómo interactúa usted con el Sitio. Nos referimos a esta información recopilada automáticamente como “Información del dispositivo”.</p>
            <p>Recopilamos Información del dispositivo mediante el uso de las siguientes tecnologías:</p>
            <ul>
                <li><strong>Cookies:</strong> Archivos de datos que se colocan en su dispositivo o computadora y que a menudo incluyen un identificador único anónimo.</li>
                <li><strong>Archivos de registro:</strong> Rastrean las acciones que ocurren en el Sitio y recopilan datos, incluyendo su dirección IP, tipo de navegador, proveedor de servicio de Internet, páginas de referencia/salida y marcas de fecha/horario.</li>
                <li><strong>Balizas web, etiquetas y píxeles:</strong> Archivos electrónicos utilizados para registrar información sobre cómo navega usted por el Sitio.</li>
            </ul>
            <p>Además, cuando hace una compra o intenta hacer una compra a través del Sitio, recopilamos cierta información de usted, entre la que se incluye su nombre, dirección de facturación, dirección de envío, información de pago (incluidos los números de la tarjeta de crédito), dirección de correo electrónico y número de teléfono. Nos referimos a esta información como “Información del pedido”.</p>
            <p>Cuando hablamos de “Información personal” en la presente Política de privacidad, nos referimos tanto a la Información del dispositivo como a la Información del pedido.</p>
        </article>

        <article>
            <h2>¿CÓMO UTILIZAMOS SU INFORMACIÓN PERSONAL?</h2>
            <p>Usamos la Información del pedido que recopilamos en general para preparar los pedidos realizados a través del Sitio (incluido el procesamiento de su información de pago, la organización de los envíos y la entrega de facturas y/o confirmaciones de pedido). Además, utilizamos esta Información del pedido para:</p>
            <ul>
                <li>Comunicarnos con usted.</li>
                <li>Examinar nuestros pedidos en busca de fraudes o riesgos potenciales.</li>
                <li>Proporcionarle información o publicidad relacionada con nuestros productos o servicios, de acuerdo con las preferencias que usted compartió con nosotros.</li>
            </ul>
            <p>Utilizamos la Información del dispositivo que recopilamos para ayudarnos a detectar posibles riesgos y fraudes (en particular, su dirección IP) y, en general, para mejorar y optimizar nuestro Sitio.</p>
        </article>

        <article>
            <h2>COMPARTIR SU INFORMACIÓN PERSONAL</h2>
            <p>Compartimos su Información personal con terceros para que nos ayuden a utilizar su Información personal, tal como se describió anteriormente. Por ejemplo:</p>
            <ul>
                <li>Utilizamos Google Analytics para ayudarnos a comprender cómo usan nuestros clientes el Sitio. Puede obtener más información sobre cómo Google utiliza su Información personal aquí: <a href="https://www.google.com/intl/es/policies/privacy/" target="_blank">https://www.google.com/intl/es/policies/privacy/</a>.</li>
                <li>Puede darse de baja de Google Analytics aquí: <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">https://tools.google.com/dlpage/gaoptout</a>.</li>
            </ul>
            <p>Finalmente, también podemos compartir su Información personal para cumplir con las leyes y regulaciones aplicables, para responder a una citación, orden de registro u otra solicitud legal de información que recibamos, o para proteger nuestros derechos.</p>
        </article>

        <article>
            <h2>PUBLICIDAD ORIENTADA POR EL COMPORTAMIENTO</h2>
            <p>Utilizamos su Información personal para proporcionarle anuncios publicitarios dirigidos o comunicaciones de marketing que creemos que pueden ser de su interés. Para más información sobre cómo funciona la publicidad dirigida, puede visitar la página educativa de la Iniciativa Publicitaria en la Red ("NAI") en <a href="http://www.networkadvertising.org/understanding-online-advertising/how-does-it-work" target="_blank">http://www.networkadvertising.org/understanding-online-advertising/how-does-it-work</a>.</p>
            <p>Además, puede darse de baja de algunos de estos servicios visitando el portal de exclusión voluntaria de Digital Advertising Alliance en: <a href="http://optout.aboutads.info/" target="_blank">http://optout.aboutads.info/</a>.</p>
        </article>

        <article>
            <h2>SUS DERECHOS</h2>
            <p>Si usted es un residente europeo, tiene derecho a acceder a la información personal que tenemos sobre usted y a solicitar que su información personal sea corregida, actualizada o eliminada. Si desea ejercer este derecho, comuníquese con nosotros a través de la información de contacto que se encuentra a continuación.</p>
            <p>Además, si usted es un residente europeo, tenga en cuenta que su información se transferirá fuera de Europa, incluidos Canadá y los Estados Unidos.</p>
        </article>

        <article>
            <h2>RETENCIÓN DE DATOS</h2>
            <p>Cuando realiza un pedido a través del Sitio, mantendremos su Información del pedido para nuestros registros a menos que y hasta que nos pida que eliminemos esta información.</p>
        </article>

        <article>
            <h2>CAMBIOS</h2>
            <p>Podemos actualizar esta política de privacidad periódicamente para reflejar, por ejemplo, cambios en nuestras prácticas o por otros motivos operativos, legales o reglamentarios.</p>
        </article>

        <article>
            <h2>CONTÁCTENOS</h2>
            <p>Para obtener más información sobre nuestras prácticas de privacidad, si tiene alguna pregunta o si desea presentar una queja, contáctenos por correo electrónico a <strong>lluismunoz7@gmail.com</strong>.</p>
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