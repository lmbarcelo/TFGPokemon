<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['paypal']) && isset($_SESSION['carrito'])) {
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $cp = $_POST['cp'];
        $telefono = $_POST['telefono'];
        $total = 0;

        $conexion = new mysqli("localhost", "root", "", "magiktcg");
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        foreach ($_SESSION['carrito'] as $producto) {
            $productoNombre = $conexion->real_escape_string($producto['nombre']);
            $idioma = $conexion->real_escape_string($producto['idioma']); // Asegúrate de tener este campo
            $subtotal = $producto['precio'] * $producto['cantidad'];
            $total += $subtotal;

            $stmt = $conexion->prepare("INSERT INTO pedidos (nombre, direccion, ciudad, cp, telefono, producto, idioma, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssd", $nombre, $direccion, $ciudad, $cp, $telefono, $productoNombre, $idioma, $subtotal);
            $stmt->execute();
            $stmt->close();
        }

        // Limpia el carrito
        unset($_SESSION['carrito']);

        $conexion->close();
    }
?>
